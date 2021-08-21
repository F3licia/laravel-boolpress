@extends('layouts.default')
@extends('layouts.nav')
@section('content')

    @if (session('status'))
    <div class="alert alert-success" role="alert">
    {{ session('status') }}
    </div>
    @endif

    <div class="dashboard">
              
                    <div class="side-bar">

                        @if(  Auth::user()->type_id == 2 )
                            <p>Status: User</p>
                        @elseif(Auth::user()->type_id == 1)
                            <p>Status: Admin</p>
                        @endif

                        <a href="{{ route('user.posts.search')}}" >Fa una ricerca</a>             
                        <a href="{{ route('user.posts.mine')}}" >I tuoi post</a>
                        <a href="{{ route('user.posts.index') }}"> Tutti gli articoli</a>
                        <a href="{{ route('user.posts.create') }}"> Pubblica nuovo</a>
                        
                    </div> 
                    
                    <div class="frame">

                        <div class="round-container">
                         
                            
                            <h1>{{ __($greeting) }}
                            {{ Auth::user()->name}}</h1>

                            <div class="avatar-container">
                                <img src="{{asset('/storage/users/'.Auth::user()->name.'/'.Auth::user()->avatar_url)}}">
                            </div>
                        </div>

                        <form action="{{route('user.home')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar_url">
                            <input type="submit" value="Upload">
                        </form>

                    </div>
                 
                 

    </div>

@endsection

