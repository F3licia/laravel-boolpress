@extends('layouts.default')
@extends('layouts.nav')

@section('content')
<div class="container">
 
@if(count($errors->all())>0) 

@foreach($errors->all() as $error)
    <h5>{{$error}}</h5>   
@endforeach
@endif

    <div class="myform">

        @if(Auth::user()->name != $post->user->name)

            <div class="input-div">
               <h5>Stai modificando il post di {{$post->user->name}} del {{$post->created_at->format('d M Y') }} ({{$post->created_at->format('H:i') }})</h5>
            </div>

        @endif
        
    
        <form action ="{{route('user.posts.update', $post->id)}}" method="post" enctype="multipart/form-data"> 
            @csrf
                    
            @method('PATCH')

            <div class="input-div">
                <label class="my-file-upload">
                    <input type="file" name="postCover">
                    <i class="fas fa-image"></i>
                </label>
            </div>

                    <textarea name="title" class="my-form-control" aria-label="With textarea" rows="1" style="resize: none">{{$post->title}}</textarea>

                    <textarea name="content" class="my-form-control" aria-label="With textarea" rows="8">{{$post->content}}</textarea>

                <div class="more-info-div">

                    <div class="cat-div">
                        <div class="my-label">Scegli una categoria</div>
                         <select name="category_id" multiple size= "{{count($categories)}}" id="myCategories">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $post->category_id) ? 'selected' : '' }}> 
                                    {{ $category->name }}
                                </option>
                                
                            @endforeach
                        </select>
                     </div>
                     <div class="tags-div">
                        <div class="my-label">Tags</div>

                            
                            @foreach($tags as $tag)

                                <label class="tag-select">
                                    <input name="tags[]" type="checkbox" value="{{$tag->id}}" > 
                                    {{$tag->name}}           
                                </label> 
                                
                            @endforeach

                        </div> 
                    </div>

                    {{-- <div>
                        @foreach($post->tags as $taggg)
                          {{$taggg->name}};
                        @endforeach
                    </div> --}}
                    
                    <div class="input-div">
                        <input type="submit" value="salva le modifiche" class="send">
                    </div>
                               
        </form>
    </div>

@endsection