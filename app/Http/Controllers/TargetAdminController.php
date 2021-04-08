<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\target;

class TargetAdminController extends Controller {

    public function __construct()
    {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'admin')
            {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Get data target
        $db = target::where('id', 1)->first();
        //$db = target::find(1);
        $target = $db->target;

        // versi lama
        // Var pass to View
        // $data = array(
        //     'target' => $target,
        //     // 'a' => 'ini percobaan',
        //     'author' => 'foo'
        // );
        // return view('target')->with($data);

        return view('target', ['target' => $target]);
    }

}
