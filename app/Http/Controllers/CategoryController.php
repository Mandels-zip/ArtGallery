<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;
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
    $category = Category::findOrFail($categoryId);
    $content = Content::where('categoryId', $categoryId)->get();
    return view('pages.contentpage.contentByCategory', [
        'content' => $content,
        'categoryName' => $category->name,
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
        $request->file('img')->storeAs('public/images/categoryimg', $filename);
        $category->img = $filename;
        

        $category->save();

        return redirect()->route('home')->with('success', 'News created successfully.');
}

public function destroy($id){

    $category = Category::find($id);
    
    if (!$category) {
        return redirect()->back()->with('error', 'Category not found');
    }

    Storage::delete('public/images/categoryimg/'.$category->img);
    $category->delete();
    return redirect()->route('news')->with('success', 'Category deleted successfully');
}

}
