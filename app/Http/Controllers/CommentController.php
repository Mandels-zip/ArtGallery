<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request, $contentId)
    {
        $validatedData = $request->validate([
            'body' => 'required|max:255',
         ]);

        $comments = new Comment;

        $comments -> userId = Auth::user()->id;
        $comments -> body = $validatedData['body'];
        $comments -> contentId = $contentId;
        $comments ->save();
        return redirect()->back()->with('success', 'You commented post.');
    }

    public function destroy($commentId){
        $comment = Comment::FindOrFail($commentId);
        if($comment->userId == Auth::User()->id || (Auth::User()->role == 'admin' || Auth::User()->role == 'moderator')){
            $comment -> delete();
            return redirect()->back()->with('success', 'You deleted comment.');
        } else {
            // The authenticated user is not authorized to delete the like object
            abort(403, 'Unauthorized action.');
        }
    }

}
