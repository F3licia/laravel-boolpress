@extends('layouts.default')
@extends('layouts.nav')


@section('content')
   
@foreach($posts as $post)

    <h2>{{$post->title}}</h2>
    <p>{{$post->content}}</p>
    <a href="{{ route('admin.posts.show', $post->id) }}">More</a>
    <img src="https://picsum.photos/200" alt="">
 
    
@endforeach

@endsection
