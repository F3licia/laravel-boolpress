<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
 
    public function index()
    {
        $posts = [
            'posts' => Post::all()
        ];
        return view("admin.posts.index", $posts);
    }


    function create(){
        return view('posts.create');
    }

    function store(Request $request){
        $Data = $request->all();  
        $newpost = new post();   
        $newpost->fill($Data);   
        $newpost->save();
        return redirect()->route('posts.index');
    }


}


