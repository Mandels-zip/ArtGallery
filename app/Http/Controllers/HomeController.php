<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $user = auth()->user();
        $content = Content::allowedForUser($user)->get();
        $categories = Category::orderby('name', 'asc')->get();
        return view('pages.homepage.home', compact('categories', 'content'));
    }
}

