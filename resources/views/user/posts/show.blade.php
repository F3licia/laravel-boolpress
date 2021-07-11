@extends('layouts.default')
@extends('layouts.nav')


@section('content')
    @include('layouts.partials.card', [ "id"=> $post->id, "resource" => "posts"])
@endsection



