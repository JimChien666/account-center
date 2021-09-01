<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{

    public function signup(Request $request){
        DB::insert('insert into users (name) values (?)', [$request->get("name")]);
        $date = [
            'name' => $request->get('name'),
            'account' => $request->get('account')
        ];
        return view('account.signup-success', $date);
    }
}
