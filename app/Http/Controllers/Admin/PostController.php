<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;

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
        $categories = Category::all();
        return view('admin.posts.create', ["categories" => $categories]);
    }

    function store(Request $request){
        $Data = $request->all();  
        $newpost = new post();   
        $newpost->fill($Data);
        $newpost->user_id = $request->user()->id; //la foreign key prende il suo valore qui

        $slug = Str::slug($newpost->title); 

//----------
        $slug_base = $slug;
        $actual_post = Post::where('slug', $slug)->first(); //first() method is used to return the first of the element of a TreeSet. The first element here is being referred to the lowest of the elements in the set.
        $contatore = 1;

            while ($actual_post) {
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $actual_post = Post::where('slug', $slug)->first();
            }
        $newpost->slug = $slug;
//----------

        $newpost->save();
        return redirect()->route('admin.posts.index');
    }

    
    function show($slug) {

        $post = Post::where('slug', $slug)->first();

            if(!$post){
                abort(404);
            }
      
          return view('admin.posts.show', [ 'post' => $post]);
      }

    public function edit(Post $post) {
        $categories = Category::all();

            $data = [
                'post' => $post,
                'categories' => $categories
            ];

        return view('admin.posts.edit', $data);
    }

    function update(Request $request, Post $post){   
  
        $Data = $request->all();     
//---       
        if ($Data['title'] != $post->title) {

            $slug = Str::slug($Data['title']);
            $slug_base = $slug;
            $actual_post = Post::where('slug', $slug)->first();
            $contatore = 1;

                while ($actual_post) {
                    $slug = $slug_base . '-' . $contatore;
                    $contatore++;
                    $actual_post = Post::where('slug', $slug)->first();
                }
            $Data['slug'] = $slug;
            }
            
        $post->update($Data);  
        return redirect()->route('admin.posts.index');
    }

    function destroy($id) {

        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }


//////Filtro "i miei post"

    public function allmine(){

         $posts = Post::where('user_id', '=' , Auth::user()->id)->get();
        
            if (!$posts) {
                abort(404);
            }
        return view("admin.posts.mine", [ "posts"=> $posts]);

    }
//////Filtro "gli ultimi n post"

    public function lastposts(){

        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();

           if (!$posts) {
               abort(404);
            }
    return view("admin.posts.latest", [ "posts"=> $posts]);

   }
}


