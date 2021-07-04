@extends('layouts.default')
@extends('layouts.nav')


@section('content')

<div class="container">
<div class="d-flex align-content-between flex-wrap">
    
    @foreach($posts as $post)
        <div class="card mb-auto p-2" style="width: 18rem;">
            <img class="card-img-top" src="https://picsum.photos/200" alt="Card image cap">
            <div class="card-body">
            <h3 class="card-title">{{$post->title}}</h3>
            <h4>By {{$post->user->name}}</h4>
            <p>On {{ $post->created_at->format('d M Y - H:i:s') }}</p>
            <h3 class="card-title">{{ substr($post->content, 0, 50)."..."}}</h3>
            
            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Show more</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a> 
            @include('layouts.partials.deleteBtn', [ "id" => $post->id, "resource" => "posts" ])

            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
