<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function index()
    {
    $news = News::latest('post_date')->get();
    if (request('search')) {
        $news = News::where('title', 'like', '%' . request('search') . '%')->get();
    } else {
         $news = News::all();
    }
    return view('pages.newspage.news', compact('news'));
    }

    public function article(News $news){
        return view('pages.newspage.article', compact('news'));
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg|max:3072'
         ]);

         $user = Auth::user();
         $post_date = now();

         $news = new News();

         $news->title = $validatedData['title'];
         $news->text = $validatedData['text'];
         $news->post_date = $post_date;
         $news->UserId = $user->id;
        
            $filename = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/images/newsimg', $filename);
            $news->img = $filename;
            

            $news->save();

            return redirect()->route('news')->with('success', 'News created successfully.');
    }

    public function destroy($id){

        $news = News::find($id);
        
        if (!$news) {
            return redirect()->back()->with('error', 'News not found');
        }

        Storage::delete('public/images/newsimg/'.$news->img);
        $news->delete();
        return redirect()->route('news')->with('success', 'News deleted successfully');
    }

    public function edit(News $news){
        return view('pages.newspage.editarticle', compact('news'));
    }

    public function update(Request $request, $id){

        $news = News::find($id);
        if (Auth::user()->id === $news->userId || Auth::user()->role === 'admin') {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg|max:3072'
         ]);
        
         $user = Auth::user();


         if (!$news) {
            return back()->with('error', 'News article not found.');
        }

         $news->title = $validatedData['title'];
         $news->text = $validatedData['text'];
         $news->UserId = $user->id;

         Storage::delete('public/images/newsimg/' . $news->img);
            $filename = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/images/newsimg', $filename);
            $news->img = $filename;
            
            $news->save();

            return redirect()->route('personal.page')->with('success', 'User updated successfully.');

    } else {
        return redirect()->route('personal.page')->with('error', 'You do not have permission to update this news article.');
    }
    }
    
}
