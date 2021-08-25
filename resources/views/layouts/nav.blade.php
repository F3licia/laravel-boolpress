     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
             
               {{-- {{Request::route()->getName()}}   nome intestazione pagina--}} 

                @if( Request::route()->getName() == "user.home")
                   Home sweet home!

                @elseif( Request::route()->getName() == "user.posts.index")
                   Così tanto da leggere...

                @elseif( Request::route()->getName() == "user.posts.mine")
                    Guarda,ci sono tutti i tuoi post!
        
                @elseif( Request::route()->getName() == "user.posts.create")
                    Era una notte buia e tempestosa...

                @elseif( Request::route()->getName() == "user.posts.edit")
                    È per questo che c'è una gomma per ogni matita...

                @elseif( Request::route()->getName() == "user.posts.show")
                    Mi piace l'odore di un buon articolo al mattino...

                @elseif( Request::route()->getName() == "user.posts.search")
                    Io vi troverò... e vi leggerò!

                @elseif( Request::route()->getName() == "user.posts.filter")
                    Ricerca per tag
                @else
                    {{Request::route()->getName()}}
                @endif


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    @if(Auth::user()->avatar_url)
                                      <img class="my-profile-image" src="{{asset('/storage/users/'.Auth::user()->name .'/'.Auth::user()->avatar_url)}}" alt="profile_image">
                                    @endif

                                    {{ Auth::user()->name }}
                                </a>

           {{--start drop--}}   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 


                            {{--@if (Auth::user()->type_id == 1)--}}

                                     <a class="dropdown-item" href="{{ route('user.home') }}">{{ Auth::user()->name}}</a>

                                     <a class="dropdown-item" href="{{ route('user.posts.index') }}"> Tutti i post </a>

                                     <a class="dropdown-item" href="{{ route('user.posts.create') }}"> Pubblica nuovo</a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

