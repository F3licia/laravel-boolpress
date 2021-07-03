@extends('layouts.default')
@extends('layouts.nav')

@section('content')
<h2>{{$post->title}}</h2>
<p>{{$post->content}}</p>

<p>{{ $post->created_at->format('d M Y - H:i:s') }}</p>
<img src="https://picsum.photos/200" alt="">
@endsection