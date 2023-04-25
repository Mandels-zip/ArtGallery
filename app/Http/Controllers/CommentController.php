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
        return redirect()->back()->with('success', 'You liked post.');
    }

}
