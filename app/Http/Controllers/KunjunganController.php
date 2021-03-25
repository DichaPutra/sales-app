<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KunjunganController extends Controller {

    public function index() {
        //Page depan Kunjungan
    }

    public function TambahKunjunganForm() {
        return view('tambahkunjungan');
    }

    public function insertKunjungan(Request $request) {
        
    }

}
