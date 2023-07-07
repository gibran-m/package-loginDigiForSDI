<?php

namespace Smpl\LoginDigiForSDI\Http\Controllers;

use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class LoginDigiForSDIController extends Controller
{
    public function index(Request $request)
    {
    //  dd(view());
     return view('vendor.login.index'); 

    }

    public function auth(Request $request){
        
        return view('vendor.login.index'); 
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->intended($this->redirectPath());
    }
}
