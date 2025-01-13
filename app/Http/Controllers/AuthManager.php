<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        $request ->validate([
            'email'=> 'required|email',
            'password' => 'required|min:8',
        ]);
        $credentials = $request -> only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route("home"));
        }
        return redirect(route("login"))->withErrors("error", "Invalid Email and Password!!!");
    }


    function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended(route("login"));
    }


    function register()
    {
        return view("auth.register");
    }

    function registerPost(Request $request)
    {
        $request ->validate([
            "fullname" => "required",
            "email"=> "required|email",
            "password"=> "required|min:8",

        ]);
        $user = new User;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save())
        {
            return redirect(route("login"))->with("success", "You have successfully registered! ");
        }
        return redirect(route("register"))->withErrors("error","Registration Failed ! ");
    }
}
