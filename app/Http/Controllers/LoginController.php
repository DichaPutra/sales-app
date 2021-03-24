<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class LoginController extends Controller {

    public function index() {
        // Var pass to View
        $data = array(
            'pesan' => '',
            'Description' => 'pass data 2',
            'author' => 'pass data 3'
        );
        return view('login')->with($data);
    }

    public function dologin(Request $request) {
        // get data
        $request->all();
        $username = $request->username;
        $password = $request->password;
        //var_dump($email);
        // check email pass 
        if ($dbuser = user::where('username', '=', $username)->first()) {
            if ($dbuser->password == $password) {
                // login sukses
                if ($dbuser->tipe == 'admin') {
                    echo 'page admin';
                } elseif ($dbuser->tipe == 'atasan') {
                    session(['username' => $dbuser->username]);
                    return redirect()->route('target');
                } elseif ($dbuser->tipe == 'sales') {
                    session(['username' => $dbuser->username]);
                    return redirect()->route('kunjungan');
                }
            } else {
                // password salah
                $pesan = 'Error, wrong password';
                return view('login', ["pesan" => $pesan]);
            }
        } else {
            //email tidak di temukan
            $pesan = 'Error, username not found';
            return view('login', ["pesan" => $pesan]);
        }
    }

}
