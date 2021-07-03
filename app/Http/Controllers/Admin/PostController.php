<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; //questa classe va importata per la slug


class PostController extends Controller
{
 
    function index()
    {
        $posts = [
            'posts' => Post::all()
        ];
        return view("admin.posts.index", $posts);
    }


    function create(){
        return view('admin.posts.create');
    }

    function store(Request $request){
        $Data = $request->all();  
        $newpost = new post();   
        $newpost->fill($Data);
        $newpost->user_id = $request->user()->id; //la foreign key prende il suo valore qui

        $slug = Str::slug($newpost->title); //va implementato
        $newpost->slug = $slug;

        $newpost->save();
        return redirect()->route('admin.posts.index');
    }

    
    function show($id) {
        $post = Post::find($id);

          if (is_null($post)) { abort(404);}

        return view('admin.posts.show', [ "post"=>$post]);
      }

//////Filtro "i miei post"

    public function allmine(){

         $posts = Post::where('user_id', '=' , Auth::user()->id)->get();
        
            if (!$posts) {
                abort(404);
            }
        return view("admin.posts.all", [ "posts"=> $posts]);

    }

    public function lastposts(){

        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();

           if (!$posts) {
               abort(404);
            }
    return view("admin.posts.latest", [ "posts"=> $posts]);

   }
}


