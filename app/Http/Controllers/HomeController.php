<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginSevice;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected LoginSevice $service;

    function __construct(LoginSevice $service)
    {
        $this->service = $service;
    }

    public function home(){
        return view('welcome');
    }

    public function login(){
        return view('frontend.login');
    }

    public function loginPost(LoginRequest $request){

        try{
            $this->service->login($request);
            return redirect()->route('dashboard')->with('message', 'Login Sucessful');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Credential not matched');
        }

    }
}
