@extends('layouts.default')
@extends('layouts.nav')


@section('content')

<div class="container">
<div class="card-group">
    
    @foreach($posts as $post)
        <div class="card mb-auto p-2" style="width: 18rem">
            <img class="card-img-top" src="https://picsum.photos/200/100" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title text-uppercase">{{$post->title}}</h2>
                <h4>By {{$post->user->name}}</h4>
                <p>On {{ $post->created_at->format('d M Y - H:i:s') }}</p>
                <h3 class="card-text">{{ substr($post->content, 0, 50)."..."}}</h3>
                
                <div class="d-flex justify-content-center align-items-start"> 
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary"> More </a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary"> Edit </a> 
                    @include('layouts.partials.deleteBtn', [ "id" => $post->id, "resource" => "posts" ])
                </div> 
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
