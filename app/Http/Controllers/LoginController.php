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
        $email = $request->email;
        $password = $request->password;
        //var_dump($email);
        // check email pass 
        if ($dbuser = user::where('email', '=', $email)->first()) {
            $dbpass = $dbuser->password;

            if ($dbpass == $password) {
                // login sukses
                echo 'Berhasil login';
            } else {
                // password salah
                $pesan = 'Error, password not match';
                return view('login', ["pesan" => $pesan]);
            }
        } else {
            //email tidak di temukan
            $pesan = 'Error, email not found';
            return view('login', ["pesan" => $pesan]);
        }
    }

}
