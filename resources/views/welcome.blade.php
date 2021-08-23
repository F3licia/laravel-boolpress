<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My First Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       
    </head>
    <body>

        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right my-links">
                    @auth
                        <a href="{{ url('/user') }}">Home</a> {{----}}
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
            <div class="content">
                <div class="title m-b-md">
                    My First Blog
                </div>

                <div class="my-links"> 
                    @guest
                     <a  href="{{ route('index') }}"> What's new? </a>    
                    @endguest

                    @auth
                      <a  href="{{ route('user.posts.index') }}"> What's new? </a>    
                    @endauth
                   
        </div>
     

   

    </body>
</html>
