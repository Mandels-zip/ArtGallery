<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
    // Debugging statement

    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        // Debugging statement
        dd('User authenticated!');
        return redirect()->intended('/');
    }
    // Debugging statement
    dd('Authentication failed!');
    return redirect()->intended('error');

       
}

}