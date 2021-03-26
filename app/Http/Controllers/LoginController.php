<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class LoginController extends Controller {

    public function index() {

        return view('login');
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
                    session(['userid'=>$dbuser->id,'username' => $dbuser->username, 'tipe' => 'atasan']);
                    return redirect()->route('target');
                } elseif ($dbuser->tipe == 'sales') {
                    session(['userid'=>$dbuser->id,'username' => $dbuser->username, 'tipe' => 'sales']);
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
