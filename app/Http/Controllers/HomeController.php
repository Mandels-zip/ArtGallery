<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $content = Content::orderby('title', 'asc')->get();
        $categories = Category::orderby('name', 'asc')->get();

        return view('pages.homepage.home', compact('categories', 'content'));
    }
}
