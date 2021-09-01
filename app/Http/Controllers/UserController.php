<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{

    public function signup(Request $request){

        $result = DB::table('users')->where('email', $request->get("email"))->exists();
        if(!$result && $request->get("password")==$request->get("passwordCheck")){
            DB::insert(
                'insert into users (name, email, password) values (?, ?, ?)',
                [
                    $request->get("name"),
                    $request->get("email"),
                    $request->get("password")
                ]
            );
            $date = [
                'name' => $request->get('name'),
                'email' => $request->get('email')
            ];
            return view('account.signup-success', $date);
        }else{
            return "帳號已註冊過或密碼確認不一致";
        }

    }
}
