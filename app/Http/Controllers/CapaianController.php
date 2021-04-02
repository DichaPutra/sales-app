<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\kunjungan;

class CapaianController extends Controller {

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
        $userid = $request->id;
//        var_dump($userid);
        $userdb = user::where('tipe', '=', 'sales')->get();

        $namasales = null;
        if ($userid != null)
        {
            $namasalesdb = user::where('id', '=', $userid)->pluck('name');
            $namasales = $namasalesdb[0];
        }


        // select (id yang dipilih) , ( tanggal, bulan, tahun = now ) 
        $datatabel = kunjungan::where('user_id', '=', $userid)
                ->where('tanggal', '=', date('d'))
                ->where('bulan', '=', date('m'))
                ->where('tahun', '=', date('Y'))
                ->get();

//        var_dump($datatabel);
        return view('capaian', ['user' => $userdb, 'datatabel' => $datatabel, 'namasales' => $namasales]);
    }

    public function disetujui($id)
    {
        $kunjungan = kunjungan::find($id);
        $kunjungan->status = 'disetujui';
        $kunjungan->save();
        //dd($id);
        return back();
    }

    public function tidakDisetujui($id)
    {
        $kunjungan = kunjungan::find($id);
        $kunjungan->status = 'tidak disetujui';
        $kunjungan->save();
        //dd($id);
        return back();
    }

}
