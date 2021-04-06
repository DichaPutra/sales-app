<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Session;

class GantiPasswordController extends Controller {

    public function __construct()
    {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') == 'admin')
            {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index()
    {

        //get session
        $value = Session::get('userid');

        //get data from db
        $db = user::where('id', session('userid'))->first();

        // dd($db->username);

        return view('gantipassword', ['user' => $db->username, 'userid' => session('userid')]);
    }

    public function gantiPassword(Request $request)
    {
        
        $user = user::find($request->userid);
        $user->password = $request->newpassword;
        $user->save();
        return redirect()->back()->with('success', 'Sucess, your password has been updated');   
    }

}
