<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 

class PostController extends Controller
{
    function index() {
        
        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();

        if (!$posts) {
            abort(404);
        }

        return view('posts.index', ['posts'=> $posts]);
    }
}

