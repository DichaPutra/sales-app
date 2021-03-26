<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KunjunganController extends Controller {

    public function __construct() {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'sales') {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index() {
        //Page depan Kunjungan

        return view('kunjungan');
    }

    public function TambahKunjunganForm() {
        return view('tambahkunjungan');
    }

    public function insertKunjungan(Request $request) {
        
    }

}
