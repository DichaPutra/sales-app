<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\kunjungan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller {

    public function __construct()
    {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'atasan')
            {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        // bulansekarang (1-12)
        $bulannow = date('n');


        //get data from view
        $userid = $request->iduser;
        $bulan = $request->bulan;

        //get all data sales
        $userdb = user::where('tipe', '=', 'sales')->get();

        //ambil nama sales
        $namasales = null;
        $kunjungan = null;
        if ($userid != null)
        {
            //get data kunjungan
            $kunjungan = DB::select("SELECT tanggal, AVG(target) as target, 
                                COUNT(tanggal) as input ,
                                sum( case when status = 'tercapai' then 1 else 0 end ) as `tercapai` ,
                                sum( case when status = 'tidak tercapai' then 1 else 0 end ) as `tidak_tercapai` ,
                                sum( case when status = 'disetujui' then 1 else 0 end ) as `disetujui` ,
                                sum( case when status = 'tidak disetujui' then 1 else 0 end ) as `tidak_disetujui` 
                                FROM `kunjungan` WHERE `user_id` = $userid AND `bulan` = $bulan
                                GROUP BY tanggal");

            $namasalesdb = user::where('id', '=', $userid)->pluck('name');
            $namasales = $namasalesdb[0];
            //dd($kunjungan);
        }


        return view('laporan', [
            'user' => $userdb,
            'userid' => $userid,
            'bulan' => $bulan,
            'namasales' => $namasales,
            'bulannow' => $bulannow,
            'kunjungan' => $kunjungan
        ]);
    }

}
