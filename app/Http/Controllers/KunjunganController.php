<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kunjungan;
use App\Models\customer;
use App\Models\target;
use Illuminate\Support\Facades\DB;

class KunjunganController extends Controller {

    public function __construct()
    {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'sales')
            {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index()
    {
        //--------------------
        //Page depan Kunjungan
        //---------------------

        $tar = target::first();
        $target = $tar->target;
        $tanggal = date('d');
        $bulan = date('m');
        $tahun = date('Y');

        $jmlKunjungan = kunjungan::where('tanggal', '=', $tanggal)
                        ->where('bulan', '=', $bulan)
                        ->where('tahun', '=', $tahun)
                        ->where('user_id', '=', session('userid'))
                        ->groupBy('user_id')->count();

        $sisakunjungan = $target - $jmlKunjungan;

        //echo "target = $target | jumlah kunjungan saat ini = $jmlKunjungan";
        // ==============================================================
        $alldailykunjungan = kunjungan::where('tanggal', '=', $tanggal)
                        ->where('bulan', '=', $bulan)
                        ->where('tahun', '=', $tahun)
                        ->where('user_id', '=', session('userid'))->get();

        return view('kunjungan', ["alldailykunjungan" => $alldailykunjungan, 'sisakunjungan' => $sisakunjungan, 'target' => $target,
            'todaykunjungan' => $jmlKunjungan]);
    }

    public function TambahKunjunganForm()
    {
        $db = customer::select('id', 'nama_perusahaan')->get();
        return view('tambahkunjungan', ['customer' => $db]);
    }

    public function insertKunjungan(Request $request)
    {
        $kunjungan = $request->kunjungan;
        $tar = target::first();
        
        if ($kunjungan == 'sudah')
        {
//            echo "$namapic | $kontakpic | $produk | $kisaranharga | $waktu | $lainlain | $filefoto";
            $dbkunjungan = new kunjungan;
            $dbkunjungan->user_id = session('userid');
            $dbkunjungan->nama_perusahaan = $request->customer;
            $dbkunjungan->target = $tar->target;
            $dbkunjungan->tanggal = date('d');
            $dbkunjungan->bulan = date('m');
            $dbkunjungan->tahun = date('Y');
            $dbkunjungan->nama_pic = $request->namapic;
            $dbkunjungan->contact_no_pic = $request->kontakpic;
            $dbkunjungan->produk = $request->produk;
            $dbkunjungan->harga = $request->kisaranharga;
            $dbkunjungan->waktu_pembelian = $request->waktu;
            $dbkunjungan->lainlain = $request->lainlain;
            $dbkunjungan->foto = $request->filefoto->store('public/fotokunjungan');
            $dbkunjungan->status = 'tercapai'; // tercapai|tidak tercapai|ditolerir|tidak ditolerir
            $dbkunjungan->save();

            return redirect()->route('kunjungan');
        }
        elseif ($kunjungan = 'belum')
        {

            $dbkunjungan = new kunjungan;
            $dbkunjungan->user_id = session('userid');
            $dbkunjungan->nama_perusahaan = 'Tidak Melakukan Kunjungan';
            $dbkunjungan->target = $tar->target;
            $dbkunjungan->tanggal = date('d');
            $dbkunjungan->bulan = date('m');
            $dbkunjungan->tahun = date('Y');
            $dbkunjungan->status = 'tidak tercapai'; // tercapai|tidak tercapai|ditolerir|tidak ditolerir
            $dbkunjungan->save();
//            $alasan = $request->alasan;
            return redirect()->route('kunjungan');
        }
    }

}
