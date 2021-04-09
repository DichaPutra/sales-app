<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class UserAdminController extends Controller {

    public function __construct() {
        //Ambil session di constructor
        $this->middleware(function ($request, $next) {
            //cek session jiga blm login -> kembalikan ke halaman login
            $username = session('username');
            if ((session('username') == null) && session('tipe') != 'admin') {
                return redirect()->route('relogin');
            }
            return $next($request);
        });
    }

    public function index() {
        //echo 'controller user admin';
        $datauser = user::get();

        return view('useradmin', ['datauser' => $datauser]);
    }

    public function addUser(Request $request) {
        $user = new user;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->tipe = $request->tipe;
        $user->save();

        return back();
    }

    public function editUser(Request $request) {
        $user = user::find($request->id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->tipe = $request->tipe;
        $user->save();

        return back();
    }

    public function deleteUser($id) {
        user::where('id', $id)->delete();
        return back();
    }

}
