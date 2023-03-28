<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
    $content = Content::orderby('title', 'asc')->get();
    return view('pages.homepage.home', compact('content'));
   }
}
