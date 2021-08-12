<div class="container article">

            <div class="d-flex justify-content-center">
                @if(count($post->tags) > 0)
                @foreach($post->tags as $tag)

                    <a href="{{ route('user.posts.filter', ["tag"=>$tag->id]) }}">
                        {{ '#' . $tag->name }}
                    </a>

                    @endforeach
                @endif
            </div>

            <div class="d-flex justify-content-center">
                <h2 class="card-title text-uppercase">{{$post->title}} </h2>
            </div>

            <div class="d-flex justify-content-center">
                <h4 class="font-italic">di  {{$post->user->name}}  </h4>
            </div>

            <div class="articleImg">
                <img src="{{ asset('storage/' . $post->cover_url) }}" class="figure-img img-fluid rounded" >
            </div>

            
            <h4 class=""> {{ $post->category ? 'in '.$post->category->name : ' ' }} </h4>
            <h6>{{ $post->created_at->format('d M Y - H:i') }}</h6>
                  
            <p>{{$post->content}}</p>  

                
                
                @auth       {{--pulsanti azioni solo auth--}}
                    <div class="d-flex align-items-start">
            
                        @if(Auth::user()->id == $post->user_id)
                            <a href="{{ route('user.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> Edit </a> 
                            @include('layouts.partials.deleteBtn', [ "id" => $post->id, "resource" => "posts" ])
                        @endif
                    </div> 
                @endauth
               
             
     


</div>