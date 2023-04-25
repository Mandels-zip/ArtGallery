<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;

class ContentController extends Controller
{
  
   public function contentDetail($id)
    {
        $content = Content::findOrFail($id);
        $comments = $content->comment;
        return view('pages.contentpage.contentDetail', compact('content', 'comments'));
   }

}
