@extends('layouts.default')
@extends('layouts.nav')

 
@if(count($errors->all())>0) 

@foreach($errors->all() as $error)
    <h5>{{$error}}</h5>   
@endforeach
@endif



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <form action ="{{route('admin.posts.update', $post->id)}}" method="post"> 
                    @csrf
                    
                    @method('PATCH')

                <div class="form-group">
                     
                    <div class="card-header">
                        <h5>Stai modificando il post di {{$post->user->name}} del {{$post->created_at->format('d M Y') }} ({{$post->created_at->format('H:i') }})</h5>
                        <textarea name="title" class="form-control" aria-label="With textarea" style="resize: none">{{$post->title}}</textarea>
                    </div>

                    <div class="card-body">

                        <textarea name="content" class="form-control" aria-label="With textarea" rows="8">{{$post->content}}</textarea>

                        <select name="category_id" id="">
                            <option value="">Seleziona una categoria</option>

                            @foreach($categories as $category)

                                <option value="{{$category->id}}">
                                    {{ $category->name }}
                                </option>

                            @endforeach
                        </select>
                        
                        <input type="submit" value="invia">
                    </div>
                </div>            
                </form>
            </div>
        </div>
    </div>
</div>
@endsection