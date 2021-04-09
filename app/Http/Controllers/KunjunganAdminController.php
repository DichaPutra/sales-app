<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\kunjungan;
use Illuminate\Support\Facades\DB;

class KunjunganAdminController extends Controller {

    public function __construct() {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'admin') {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index(Request $request) {
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
        $namasalesdb = null;
        if ($userid != null) {

            $tahun = date('Y');
            //get data kunjungan
            $kunjungan = kunjungan::where('user_id', $userid)->where('bulan', $bulan)->where('tahun', $tahun)->get();

            //DB::select("SELECT * FROM `kunjungan` WHERE `user_id` = $userid AND `bulan` = $bulan AND `tahun` = $tahun");

            $namasalesdb = user::where('id', '=', $userid)->pluck('name');
            $namasales = $namasalesdb[0];
            //dd($kunjungan);
        }


        //echo "$namasales| $userid | $bulan | now : $bulannow |";
        return view('kunjunganAdmin', [
            'user' => $userdb,
            'userid' => $userid,
            'bulan' => $bulan,
            'namasales' => $namasales,
            'bulannow' => $bulannow,
            'kunjungan' => $kunjungan
        ]);
    }

    public function updateStatusKunjungan(Request $request) {
        //echo "id = $request->idkunjungan | $request->status ";

        $kunjungan = kunjungan::find($request->idkunjungan);
        $kunjungan->status = $request->status;
        $kunjungan->save();

        return back();
    }

    public function deleteKunjungan($id) {

        //ambil data status
        $kunjungan = kunjungan::where('id', $id)->first();
        //dd($kunjungan->status);
        
        if ($kunjungan->status == 'tercapai') {
            // delete data db dan foto
            kunjungan::where('id', $id)->delete();
            
        } else {
            // delete data db saja
            kunjungan::where('id', $id)->delete();
        };
        
        return back();
    }

}
