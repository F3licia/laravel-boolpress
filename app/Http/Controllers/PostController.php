<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 

class PostController extends Controller
{
    function index() {
       // $posts = post::all();

        //return view('posts.index', ['posts'=> $posts]);
    }
}
