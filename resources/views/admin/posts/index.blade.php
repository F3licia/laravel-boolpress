@extends('layouts.default')
@extends('layouts.nav')


@section('content')
<div class="container">
    
    @foreach($posts as $post)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://picsum.photos/200" alt="Card image cap">
            <div class="card-body">
            <h3 class="card-title">{{$post->title}}</h3>
            <h4>By {{$post->user->name}}</h4>
            <p>On {{ $post->created_at->format('d M Y - H:i:s') }}</p>
            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Show more</a>
            </div>
        </div>
    @endforeach
</div>  
@endsection
