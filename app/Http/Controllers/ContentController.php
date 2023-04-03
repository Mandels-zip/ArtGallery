<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class ContentController extends Controller
{
  
   public function contentDetail($id)
    {
        $content = Content::findOrFail($id);
        return view('pages.contentpage.contentDetail', compact('content'));
   }
}
