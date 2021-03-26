<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kunjungan;
use App\Models\customer;

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
        $db = customer::select('id', 'nama_perusahaan')->get();
        return view('tambahkunjungan',['customer'=>$db]);
    }

    public function insertKunjungan(Request $request) {
        $kunjungan = $request->kunjungan;
        if ($kunjungan == 'sudah') {

//            echo "$namapic | $kontakpic | $produk | $kisaranharga | $waktu | $lainlain | $filefoto";
            $dbkunjungan = new kunjungan;
            $dbkunjungan->user_id = session('userid');
            $dbkunjungan->customer_id = $request->customer;
            $dbkunjungan->namapic = $request->namapic;
            $dbkunjungan->kontakpic = $request->kontakpic;
            $dbkunjungan->produk = $request->produk;
            $dbkunjungan->kisaranharga = $request->kisaranharga;
            $dbkunjungan->waktu = $request->waktu;
            $dbkunjungan->lainlain = $request->lainlain;
            $dbkunjungan->filefoto = $request->filefoto->store('public/fotokunjungan');

            return redirect()->route('tambahKunjungan');
        } elseif ($kunjungan = 'belum') {
            $alasan = $request->alasan;
            dd($alasan);
        }
    }

}
