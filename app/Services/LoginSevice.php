<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginSevice
{

    function login($request){

        $request->validated();
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return true;
        }

        return false;

    }
}
