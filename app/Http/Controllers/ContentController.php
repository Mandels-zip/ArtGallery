<?php

namespace App\Http\Controllers;
use App\Models\Content;
Use Carbon\Carbon;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use illuminate\support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContentController extends Controller
{

   public function getAll(){
      $content = Content::latest('created_at');
     return $content;
   }

   public function contentDetail($id)
    {
        $content = Content::findOrFail($id);
        $comments = $content->comment;
        return view('pages.contentpage.contentDetail', compact('content', 'comments'));
   }
   
   public function store(Request $request){

      $validatedData = $request->validate([
         'title' => 'required|max:255',
         'description' => 'required',
         'img' => 'required|image|mimes:jpeg,png,jpg|max:3072',
         'categoryId' => 'required',
         'agelimit' => 'nullable|in:0,1'
      ]);

      $userid = Auth::User()->id;
      $filename = time() . '_' . $request->file('img')->getClientOriginalName();
      $request->file('img')->storeAs('public/images/contentimg', $filename);

      $content = Content::create([
      'title' =>$validatedData['title'],
      'img' =>$filename,
      'description' => $validatedData['description'],
      'categoryId' => $validatedData['categoryId'],
      'agelimit' => $request->input('agelimit', 0),
      'userId' => $userid,
      'create_date' => now()
      ]);
      
      $content ->save();

      if($content){
      return redirect()->route('user.page', ['nickname' => Auth::User()->nickname ])->with('success', 'Post created successfully.');
      }else
      {return redirect()->route('user.page', ['nickname' => Auth::User()->nickname ])->with('error validation', 'Try Again.');}
   }
   
   public function destroy($contentId){
      $content = Content::find($contentId);
        
      if (!$content) {
          return redirect()->back()->with('error', 'Content not found');
      }

      if( $content->userId != Auth::User()->id  && !in_array(Auth::user()->role, ['moderator', 'admin']))
      {
         return redirect()->back()->with('error', 'You have no right');
      }else{
         
      Storage::delete('public/images/contentimg/'.$content->img);
      $content->delete();
      return redirect()->route('home')->with('success', 'News deleted successfully');
   }
  }

   }

