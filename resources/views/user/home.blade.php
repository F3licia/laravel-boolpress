@extends('layouts.default')
@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('Welcome user') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                   <h1> {{ Auth::user()->name}}</h1>
                   <h4>Status: user </h4>

                   <img class="img-thumbnail" src="{{asset('/storage/users/'.Auth::user()->avatar_url)}}">
                 
                   <h5><a href="{{ route('user.posts.search')}}" >Fa una ricerca</a></h5>                
                   <h5><a href="{{ route('user.posts.mine')}}" >Guarda tutti i tuoi post</a></h5>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
