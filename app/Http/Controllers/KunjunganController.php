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
            $dbkunjungan->nama_perusahaan = $request->customer;
            $dbkunjungan->nama_pic = $request->namapic;
            $dbkunjungan->contact_no_pic = $request->kontakpic;
            $dbkunjungan->produk = $request->produk;
            $dbkunjungan->harga = $request->kisaranharga;
            $dbkunjungan->waktu_pembelian = $request->waktu;
            $dbkunjungan->lainlain = $request->lainlain;
            $dbkunjungan->foto = $request->filefoto->store('public/fotokunjungan');
            $dbkunjungan->save();

            return redirect()->route('kunjungan');
        } elseif ($kunjungan = 'belum') {
            $alasan = $request->alasan;
            dd($alasan);
        }
    }

}
