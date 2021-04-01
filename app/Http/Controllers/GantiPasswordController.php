<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\user;

class GantiPasswordController extends Controller {

    public function __construct() {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') == 'admin') {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index() {
        //get data from db
        $db = user::where('id', session('id'))->first();

                // dd($db->username);

        return view('gantipassword',['user'=>$db->username]);
    }

    public function gantiPassword(){

    }

}
