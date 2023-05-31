<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    public function index()
    {
    $categories = Category::orderby('name', 'asc')->get();
    return $categories;
   }

   public function sortByCategory($categoryId)
   {
    $user = auth()->user();
    $category = Category::findOrFail($categoryId);
    if (request('search')) {
        $content = Content::allowedForUser($user)->where('title', 'like', '%' . request('search') . '%')->where('categoryId', $categoryId)->get();
    } else {
        $content = Content::AllowedForUser($user)->where('categoryId', $categoryId)->get();
    }
    return view('pages.contentpage.contentByCategory', [
        'content' => $content,
        'categoryName' => $category->name,
        'categoryImg' => $category->img
    ]);
   }

   public function create(){
        return view('pages.categorypage.categorycreate');
   }

   public function store(Request $request){

    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'img' => 'required|image|mimes:jpeg,png,jpg|max:3072'
     ]);

     $category = new Category();

     $category->name = $validatedData['name'];
        $filename = time() . '_' . $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('images/categoryimg', $filename, 'public');
        $category->img = $filename;
        

        $category->save();

        return redirect()->route('home')->with('success', 'category created successfully.');
}

public function destroy($id){

    $category = Category::find($id);
    
    if (!$category) {
        return redirect()->back()->with('error', 'Category not found');
    }

    File::delete(public_path('storage/images/categoryimg/'.$category->img));
    $category->delete();
    return redirect()->route('home')->with('success', 'Category deleted successfully');
}

}
