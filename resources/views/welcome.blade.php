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
    <div class="main-welcome">

        
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

                <div id="branch" class="my-animation-svg ">
                    <?xml version="1.0" encoding="utf-8"?>
                    <!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 306.7 427.1" style="enable-background:new 0 0 306.7 427.1;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill:#637B77;stroke:#231F20;stroke-miterlimit:10;}
                        .st1{fill:#637B77;}
                    </style>
                    <rect x="-102" y="64" class="st0" width="59" height="88"/>
                    <g>
                    <path id="_x3C_branch_x3E_" class="st1" d="M181.7,112.4c-3.9,7.2-7.6,14.6-11,22.1c23.2-22.4,22.3-26.6,66.1-30.9
                        c0.2,0,0.2,0,0.1,0.1c0.4,0,0.5,0.2,0.3,0.5c-19.5,40-46.6,27.7-67.9,33.3c-3.4,7.7-6.5,15.5-9.2,23.5c-5.9,16.8-10.2,34.1-13,51.7
                        c-0.3,2.2-0.8,4.4-1.1,6.6l-0.9,6.6l-0.4,3.3l-0.3,3.3l-0.6,6.6c-0.1,1.1-0.1,2.3-0.2,3.4c28.1-33.1,24.8-38,79.9-49.4
                        c0.2,0,0.8,0.3,0.7,0.8c-19.1,52.7-54.8,40.2-80.6,50.5c-0.4,7.1-0.6,14.2-0.5,21.3c0,17.8,1.8,35.6,4.6,53.2
                        c1.9,11.1,4.2,22,7.1,32.9c10.7-58.2,3.5-61.8,60.7-112.6c0.3-0.2,1.2-0.2,1.3,0.5c13.2,75.6-38,84.7-61.3,114.9
                        c6.1,22.7,14.4,44.9,24.8,66.1c-18-31.1-30.4-65.5-37.3-101c-1.6-8.3-2.9-16.7-3.8-25.1c-34.2-17.2-84.7-2-106.6-76.1
                        c-0.2-0.6,0.6-1.1,1-1c74.5,20.3,68.8,26.7,105.4,75.3c-2.6-24.7-2.3-49.8,1.2-74.5C120,198.7,81,198.3,82.2,141.3
                        c0-0.5,0.7-0.6,0.9-0.5c47.8,30.9,42.3,34,57.2,76.5c0.3-1.8,0.5-3.7,0.8-5.5c0.4-2.2,0.7-4.5,1.2-6.7l1.4-6.7l0.7-3.3l0.8-3.3
                        l1.6-6.6c0.3-1.1,0.5-2.2,0.9-3.3l0.9-3.3l1.9-6.5l4.3-12.9c0.2-0.5,0.4-1,0.5-1.4c-11.7-18.8-39.8-28.5-26.4-70.9
                        c0.1-0.4,0.7-0.3,0.8-0.2c28.9,33.3,25.3,35.6,26.8,68.1c5.9-15.5,12.9-30.5,21.2-44.7c1.1-2,2.3-3.9,3.5-5.8l3.3-5.4
                        c-5.1-21.7-29.6-39.4-3.8-76.3c0.2-0.3,0.7-0.1,0.8,0.1c17.5,40.8,13.2,41.6,4.7,73.7c2-3,4-6.1,6.1-9.1
                        c5.3-7.3,10.7-14.5,16.6-21.4c2.4-2.8,4.9-5.6,7.4-8.4c15.3-22.5,14-25.7,49.5-36.8c0.2,0,0.6,0.2,0.5,0.5
                        c-9,35-31.8,31.4-48.5,38.3c-2.2,2.7-4.4,5.4-6.5,8.2C200.1,81.8,190.2,96.7,181.7,112.4z"/>
                        </g>
                    </svg>
                </div>
        </div>
     

   
    </div>
    </body>
</html>
