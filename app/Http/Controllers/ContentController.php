<?php

namespace App\Http\Controllers;
use App\Models\Content;
Use Carbon\Carbon;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class ContentController extends Controller
{

   public function getAll(){
      $content = Content::latest('created_at');
     return $content;
   }

   public function contentDetail($id)
    {
        $content = Content::findOrFail($id);
        $comments = $content->comment;
        return view('pages.contentpage.contentDetail', compact('content', 'comments'));
   }

}
