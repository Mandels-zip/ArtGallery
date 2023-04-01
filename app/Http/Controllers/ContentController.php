<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
    $content = Content::orderby('title', 'asc')->get();
    
   }
}
