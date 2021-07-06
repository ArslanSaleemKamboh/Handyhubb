<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function index()
    {
        return view('backend.pages.login');
    }

    public function authenticate(LoginRequest $loginRequest)
    {
        $credentials=$loginRequest->only('email','password');
        // dd($credentials);
        if(Auth::guard('admin')->attempt($credentials)){
            $loginRequest->session()->regenerate();
            return redirect()->intended('/admin');
        }
        return back()->withInput()->withErrors([
            'authentication_failed'=>'The provided credentials do not match our records',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }

}
