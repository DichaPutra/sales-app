<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class CapaianController extends Controller {

    public function __construct()
    {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'atasan')
            {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $userdb = user::where('tipe','=','sales')->get();

        return view('capaian',['user'=>$userdb]);
    }

}
