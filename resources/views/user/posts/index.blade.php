@extends('layouts.default')
@extends('layouts.nav')



@section('content')


    @include('layouts.partials.display', [ "posts" => $posts, "resource" => "posts" ])

@endsection
