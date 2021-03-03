<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\target;


class TargetController extends Controller {

    public function index() {
        // Get data target
        $db = DB::table('target')->where('id', 1)->first();
        //$db = target::find(1);
        $target = $db->target;


        // Var pass to View
        $data = array(
            'target' => $target,
            'Description' => 'This is New Application',
            'author' => 'foo'
        );

        return view('target')->with($data);
    }

    public function updateTarget(Request $request) {
        // get data
        $request->all();
        $target = $request->target;

        //update db
        $db = target::find(1);
        $db->target = $target;
        $db->save();

        return redirect()->route('target');
    }

}
