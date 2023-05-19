<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::latest()->paginate(2);
        return view('posts.index', compact('posts'));

        
    }

    public function store(Request $request){
     
        $this->validate($request, [
            'body' => 'required'

        ]);

        $request->user()->posts()->create([
            'body' =>$request->body
        ]);

        return back();
    }

    public function PDelete($id){
        $pdelete = Post::find($id)->forceDelete();

        return Redirect()->back()->with('success','Post Deleted Successfully');
    }

    public function Edit($id){
       $posts =  Post::find($id);
       return view('posts.edit',compact('posts'));
    }

    public function Update(Request $request, $id){
        $update = Post::find($id)->update([
            'body' => $request->body,
            'user_id' => Auth::user()->id

        ]);

        return Redirect()->route('posts')->with('success','category updated successfully');
    }
}
