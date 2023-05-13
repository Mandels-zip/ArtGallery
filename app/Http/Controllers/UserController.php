<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

    public function personalPage($nickname){
    $viewData = ['enable_search' => false];
    $user = User::where('nickname', $nickname)->first(); 
      $categories = Category::get();
      $likedpost= DB::table('content')
        ->join('liked', 'content.id', '=', 'liked.contentId')
        ->where('liked.UserId', '=', $user->id)
        ->get(['content.*']);
      $createdcontent = Content::get() ->where('userId', '=', $user ->id);
     return view ('pages.userpage.user', compact('user', 'likedpost','createdcontent', 'categories', 'viewData',));
    }


    public function settings($nickname){
        $viewData = ['enable_search' => false];
        $user = User::where('nickname', $nickname)->first(); 
        $age = Carbon::parse($user->date_of_birth)->diffInYears(Carbon::now());
         return view ('pages.userpage.usersettings', compact('user', 'viewData', 'age'));
        }

    public function updateProfile(Request $request) {
    
        $user = User::Find(Auth::User()->id);

        if($request->has('avatar')) {
            $filename = time() . '_' . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/images/avatar/', $filename);
            $user->avatar =$filename;
        }

        if ($request->has('enable_explicit')) {
            $user->enable_explicit = true;
        } else {
            $user->enable_explicit = false;
        }

        if($request->filled('newPassword')) {
        $validatedData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:8',
        ]);

        if (!Hash::check($validatedData['oldPassword'], $user->password)) {
            return back()->withErrors(['newPassword' => 'The current password is incorrect.']);
          }
          $user->password = Hash::make($validatedData['newPassword']);
    }

        $user->save();

        if ($request->has('newPassword')) {
            return redirect()->route('user.settings', ['nickname' => Auth::User()->nickname ])->with('success', 'Your password has been updated.');
        } else {
            return redirect()->route('user.settings', ['nickname' => Auth::User()->nickname ])->with('success', 'Your profile has been updated.');
        }
}

    public function destroy($id){
        $user = User::find($id);
        if( $user->id != Auth::User()->id  && !in_array(Auth::user()->role, ['moderator', 'admin']))
        {
           return redirect()->back()->with('error', 'You have no right');
        }
        
        if($user->role == 'admin' || ($user->role =='moderator' && Auth::User()->role != 'admin')){
            return redirect()->back()->with('error', 'You cant delete this user');
        }

        foreach( $user-> content as $cont ){
        Storage::delete('public/images/contentimg/'.$cont->img);
        }
       
        $user->content()->delete();
        $user->comments()->delete();
        $user->liked()->delete();
        // Delete the user
        $user->delete();
        return redirect()->route('home')->with('success', 'News deleted successfully');
     }

    }

