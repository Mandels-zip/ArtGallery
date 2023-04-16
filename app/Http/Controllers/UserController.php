<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email|max:255',
            'nickname' => 'required|string|unique:users,nickname|max:20',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d|before:today'
        ]);

        $user = User::create([
            'email' => $validatedData['email'],
            'nickname' => $validatedData['nickname'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'] ?? 'user',
            'date_of_birth' => $validatedData['date_of_birth']
        ]);

        $user->save();

        return redirect('/');

    }
}
