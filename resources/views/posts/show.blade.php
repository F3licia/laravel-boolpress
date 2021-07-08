@extends('layouts.default')
@extends('layouts.nav')

@section('content')

<div class="container d-flex align-items-center flex-column ">
    @guest
        <h3>Wanna read more? Join us!</h3>
        <h3>
            @if (Route::has('login'))
            <a href="{{ route('login') }}">Login</a>
            @endif

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
        </h3>
    @endguest

    @include('layouts.partials.card', [ "id"=> $post->id, "resource" => "posts"])
@endsection

