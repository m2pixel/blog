<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request){
        $posts = Post::where('title', 'LIKE', "%".$request->search."%")->get();
        
        if(is_null($posts)) {
            session()->set('message', 'Test');
            return view('posts.index')->with('message', 'No post was found!');
        } else
            return view('posts.index')->with('posts',$posts);
    }
    
}
