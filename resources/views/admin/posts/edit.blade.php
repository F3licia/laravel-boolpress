@extends('layouts.default')
@extends('layouts.nav')

 
@if(count($errors->all())>0) 

@foreach($errors->all() as $error)
    <h5>{{$error}}</h5>   
@endforeach
@endif



@section('content')

    <div class="container">
    
        <form action ="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data"> 
            @csrf
                    
            @method('PATCH')

            <input type="file" name="postCover" >
                    <div class="">
                        <h5>Stai modificando il post di {{$post->user->name}} del {{$post->created_at->format('d M Y') }} ({{$post->created_at->format('H:i') }})</h5>
                    </div>

                    <div class="">

                    <textarea name="title" class="form-control" aria-label="With textarea" rows="1" style="resize: none">{{$post->title}}</textarea>

                    <textarea name="content" class="form-control" aria-label="With textarea" rows="8">{{$post->content}}</textarea>

                        
                        <select name="category_id" id="">

                            <option value="">Seleziona una categoria</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($category->id == $post->category_id) ? 'selected' : '' }}> 
                                    {{ $category->name }}
                                </option>
                                
                            @endforeach
                        </select>

                        @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                                
                                <label class="form-check-label">
                                    {{$tag->name}}
                                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}">              
                                </label> 

                            </div>
                        @endforeach

                        <input type="submit" value="salva le modifiche">
                              
        </form>
    </div>

@endsection