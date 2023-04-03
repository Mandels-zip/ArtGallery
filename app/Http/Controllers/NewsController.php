<?php

namespace App\Http\Controllers;
use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
    $news = News::orderby('created_at', 'asc')->get();
    return view('pages.newspage.news', compact('news'));
    }

    public function article(News $news){
        return view('pages.newspage.article', compact('news'));
    }
}
