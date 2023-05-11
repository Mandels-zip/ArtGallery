<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    public function toggleLike($contentId){

        $like = Like::where('UserId', Auth::user()->id)->where('contentId', $contentId)->first();
        if($like){
            $like ->delete();
            return redirect()->back()->with('success', 'your message,here');   
        }else {
        $like = new Like; 
        $like -> UserId = Auth::user()->id;
        $like -> contentId = $contentId;
        $like -> save();
        return redirect()->back()->with('success', 'your message,here');   
    }
}
}
