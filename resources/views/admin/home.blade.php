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
                   <h4>Status: Admin </h4>
                   <h4><a href="{{ route('admin.posts.latest')}}" >Le ultime pubblicazioni</a></h4>                
                   <h4><a href="{{ route('admin.posts.mine')}}" >Guarda tutti i tuoi post</a></h4>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
