<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

         return response()->json([             //non si restituiscomo mai tutti i dati assieme in quanto non è poi possibile passare nient'altro
 
             'resultes' => $posts

         ]);
    }

}
