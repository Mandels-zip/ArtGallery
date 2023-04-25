<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    public function create($contentId){

        $like = new Like; 
        $like -> UserId = Auth::user()->id;
        $like -> contentId = $contentId;
        $like -> save();
        return redirect()->back()->with('success', 'You liked post.');;
    }

    public function destroy($contentId){

        $like = Like::where('UserId', Auth::user()->id)->where('contentId', $contentId)->first();
        if ($like->UserId == Auth::user()->id) {
            // Delete the like object
            $like->delete();
            return back();
        } else {
            // The authenticated user is not authorized to delete the like object
            abort(403, 'Unauthorized action.');
        }

    }
}
