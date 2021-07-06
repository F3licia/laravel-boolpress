<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Post;
use App\Tag;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; //questa classe va importata per la slug


class PostController extends Controller
{
 
//---------------------------------------------------INDEX

    function index()
    {
        $posts = [
            'posts' => Post::all()
        ];
        return view("admin.posts.index", $posts);
    }

//-------------------------------------------------------CREATE
    function create(){
        $categories = Category::all();
        $tags = Tag::all();
            $data = [       
                'categories' => $categories,
                'tags' => $tags
            ];

        return view('admin.posts.create', $data);
    }

//----------------------------------------------------STORE

    function store(Request $request){
        $form_data = $request->all();  
        $newpost = new post();   
        $newpost->fill($form_data);
        $newpost->user_id = $request->user()->id; //la foreign key prende il suo valore qui

        $slug = Str::slug($newpost->title); 

        //--------
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

        if (!key_exists("tags", $form_data )) {
            $form_data ["tags"] = [];
        }

        $newpost->tags()->sync($form_data ["tags"]); //errore
     
        $newpost->save();
        
        return redirect()->route('admin.posts.index');
    }

//------------------------------------------------------SHOW
    
    function show($slug) {

        $post = Post::where('slug', $slug)->first();

            if(!$post){
                abort(404);
            }
      
          return view('admin.posts.show', [ 'post' => $post]);
      }

//---------------------------------------------------------EDIT

    public function edit(Post $post) {

        $categories = Category::all();
        $tags = Tag::all();
            $data = [
                'post' => $post,
                'categories' => $categories,
                'tags' => $tags
            ];

        return view('admin.posts.edit', $data);
    }

//----------------------------------------------------------UPDATE

    function update(Request $request, Post $post){   
  
        $form_data = $request->all();     
        //---       
        if ($form_data ['title'] != $post->title) {

            $slug = Str::slug($form_data ['title']);
            $slug_base = $slug;
            $actual_post = Post::where('slug', $slug)->first();
            $contatore = 1;

                while ($actual_post) {
                    $slug = $slug_base . '-' . $contatore;
                    $contatore++;
                    $actual_post = Post::where('slug', $slug)->first();
                }
            $form_data ['slug'] = $slug;
        }
        //---  

        if (!key_exists("tags", $form_data )) {
            $form_data ["tags"] = [];
        }

        $post->tags()->sync($form_data ["tags"]); //


        $post->update($form_data );
        return redirect()->route('admin.posts.index');

    }
//----------------------------------------------DESTROY

    function destroy($id) {

        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }



    

//---Filtro "i miei post" --------------------------------------------//

    public function allmine(){

         $posts = Post::where('user_id', '=' , Auth::user()->id )->get();
        
            if (!$posts) {
                abort(404);
            }
        return view("admin.posts.mine", [ "posts"=> $posts]);
    }

//Filtro "gli ultimi n post"

    public function lastposts(){

        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();

           if (!$posts) {
               abort(404);
            }
    return view("admin.posts.latest", [ "posts"=> $posts]);

   }


}


