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
                            <h3>
                                <i class="fas fa-child"></i>
                                Status: User
                            </h3>
                        @elseif(Auth::user()->type_id == 1)
                            <h3>
                                <i class="far fa-grin-stars"></i>
                                Status: Admin
                            </h3>
                        @endif

                        <a href="{{ route('user.posts.search')}}" >
                            <i class="fas fa-binoculars"></i>
                            Fa una ricerca
                        </a>             
                        <a href="{{ route('user.posts.mine')}}" >
                            <i class="fas fa-feather-alt"></i>
                            I tuoi post
                        </a>
                        <a href="{{ route('user.posts.index') }}">
                            <i class="fas fa-quote-right"></i>
                            Tutti gli articoli
                        </a>
                        <a href="{{ route('user.posts.create') }}">
                            <i class="far fa-hand-point-right"></i>
                            Pubblica nuovo
                        </a>
                        
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
                                <form action="{{route('user.home')}}" method="POST" enctype="multipart/form-data">
                                    @csrf                         

                                    <div class="input-div">
                                        <label class="my-file-upload">
                                            <input type="file" name="avatar_url">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                    </div>
                                    <input type="submit" value="Upload" class="my-btn">

                                </form>
                            </div>

                        </div>

                    </div>
                 
                 

    </div>

@endsection

