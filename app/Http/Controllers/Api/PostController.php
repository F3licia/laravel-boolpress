<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::with('user')->with("category")->with("tags")->orderBy("created_at", "DESC")->get();

    foreach($posts as $post){
        $post->categoria = $post->category ? 'in '. $post->category->name : '';
        $post->username = $post->user->name;
        $post->cover_url = $post->cover_url ? asset('storage/'. $post->cover_url) : "https://www.linga.org/site/photos/Largnewsimages/image-not-found.png";
        $post->link = route('posts.show', ["slug" => $post->slug] );
    }

        return response()->json([    //non si restituiscomo mai tutti i dati assieme in quanto non è poi possibile passare nient'altro
            'succes'=> true,
             'results' => $posts

        ]);
    }

///////////////////////

    public function filter(Request $request) {
        $filters = $request->only(["title", "content"]);
    
        $result = Post::with(["category", "tags", "user"]);
    
        foreach ($filters as $filter => $value) {
            $result->where($filter, "LIKE", "%$value%");
        }
    
        $posts = $result->get();
    
        foreach ($posts as $post) {
          $post->cover_url = $post->cover_url ? asset('storage/' . $post->cover_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png';
          $post->link = route("posts.show", ["slug" => $post->slug]);
    
          if (strlen($post->content) > 80) {
            $post->content = substr($post->content, 0, 80) . "...";
          }
        }
    
        return response()->json([
          "success" => true,
          "filters" => $filters,
          "query" => $result->getQuery()->toSql(),
          "results" => $posts
        ]);
      }
    





}

