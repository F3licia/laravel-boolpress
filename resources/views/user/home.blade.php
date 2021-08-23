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
                         
                            <div class="welcome-greeting">
                                <h1>{{ __($greeting) }}
                                {{ Auth::user()->name}}</h1>
                            </div>
                           

                            <div class="avatar-container mytoggle">
                                @if(Auth::user()->avatar_url)
                                    <img src="{{asset('/storage/users/'.Auth::user()->name.'/'.Auth::user()->avatar_url)}}">
                                @else
                                    <img src="{{asset('/storage/default/user.jpg')}}">
                                @endif
                            </div>

                            <div id="toggleDiv" class="hide">
                                <p>Carica un'immagine</p>
                                <form action="{{route('user.home')}}" method="POST" enctype="multipart/form-data">
                                    @csrf                         

                                    <div class="input-div">
                                        <label class="my-file-upload">
                                            <input type="file" name="avatar_url">
                                            <i class="fas fa-image"></i>
                                        </label>
                                    </div>
                                    <input type="submit" value="Upload" class="my-btn">

                                </form>
                            </div>

                        </div>

                    </div>
                 
                 

    </div>

@endsection

