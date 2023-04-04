<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Content;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    $categories = Category::orderby('name', 'asc')->get();
    return $categories;
   }

   public function sortByCategory($categoryId)
   {
    $content = Content::where('categoryId', $categoryId) ->get();
    $categoryName = Category::where('id', $categoryId) ->first()->name;
    return view('pages.contentpage.contentByCategory', compact('content', 'categoryName'));
   }
}
