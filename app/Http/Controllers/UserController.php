<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use App\Models\Content;

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

    public function personalPage(){
      $user = Auth::user(); 
      $likedpost= DB::table('content')
        ->join('liked', 'content.id', '=', 'liked.contentId')
        ->where('liked.UserId', '=', $user->id)
        ->get(['content.*']);
      $createdcontent = Content::get() ->where('userId', '=', $user ->id);
     return view ('pages.userpage.user', compact('user', 'likedpost','createdcontent'));
    }
}
