<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{

    public function signup(Request $request){
        $input = $request->input();
        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");
        $password_check = $request->input("password_check");
        if(Auth::attempt(['email' => $input['email']])){
            return back()->withInput()->withErrors(['fail'=>'帳號已經被註冊']);
        }
        if($password!=$password_check){
            return back()->withInput()->withErrors(['fail'=>'密碼輸入不一致']);
        }
        DB::insert(
            'insert into users (name, email, password) values (?, ?, ?)',
            [
                $name,
                $email,
                Hash::make($password)
            ]
        );
        return view('account.signup-success', [
            'name' => $name,
            'email' => $email
        ]);
    }
    public function login(Request $request){
        $input = $request->input();

        $rules = ['email'=>'required|email',
                'password'=>'required'
                ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            //fails
            return Redirect::to('login')
            ->withErrors(['fail'=>'Email or password is wrong!'])
            ->withInput($input);
        }

        if (Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])) {
            return View("account.login-success");
        }
        return Redirect::to('login')
                ->withErrors(['fail'=>'Email or password is wrong!'])
                ->withInput($input);
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('login');
    }
}
