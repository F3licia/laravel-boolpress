@extends('layouts.default')
@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('Welcome Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                   <h1> {{ Auth::user()->name}}</h1>
                   <h3>Status: Admin </h3>
                   <a href="{{ route('admin.posts.latest')}}" >Le ultime pubblicazioni</a>                
                   <a href="{{ route('admin.posts.all')}}" >Guarda tutti i tuoi post</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
