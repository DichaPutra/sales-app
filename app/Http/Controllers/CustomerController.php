<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller {

    public function __construct() {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'atasan') {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index() {
        //echo "customer controller";
        $db = customer::select('id', 'nama_perusahaan', 'alamat', 'contact_no_perusahaan')->get();

        // Var pass to View
        $data = array(
            'customer' => $db,
            'Description' => 'This is New Application',
            'author' => 'foo'
        );

        return view('customer')->with($data);
    }

    public function tambahCustomer() {
        // view form tambah customer
        return view('tambahcustomer');
    }

    public function insertCustomer(Request $request) {
        // get data
        $request->all();

        // insert data DB
        $customer = new customer;
        $customer->nama_perusahaan = $request->nama_perusahaan;
        $customer->alamat = $request->alamat_perusahaan;
        $customer->contact_no_perusahaan = $request->kontak_perusahaan;
        $customer->nama_pic = $request->nama_pic;
        $customer->email = $request->email_pic;
        $customer->contact_no_pic = $request->kontak_pic;
        $customer->twitter = $request->twitter;
        $customer->fb = $request->fb;
        $customer->wa = $request->wa;
        $customer->save();

        // redirect
        return redirect()->route('customer');
    }

    public function detailCustomer($id) {
        //get data from db
        $db = customer::select('nama_perusahaan', 'alamat', 'contact_no_perusahaan', 'nama_pic', 'email', 'contact_no_pic', 'twitter', 'fb', 'wa')
                ->where('id', $id)
                ->first();

        // Var pass to View
        $data = array(
            'nama_perusahaan' => $db->nama_perusahaan,
            'alamat' => $db->alamat,
            'contact_no_perusahaan' => $db->contact_no_perusahaan,
            'nama_pic' => $db->nama_pic,
            'email' => $db->email,
            'contact_no_pic' => $db->contact_no_pic,
            'twitter' => $db->twitter,
            'fb' => $db->fb,
            'wa' => $db->wa
        );

        return view('detailcustomer')->with($data);
    }

}
