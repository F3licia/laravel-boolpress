

@if(count($posts) == 0)
    <div class="container">
        <div class="d-flex flex-wrap justify-content-around">
            <h3>Pare non ci sia nulla qui, è il momento di rimediare!
                <a href="{{route('user.posts.create')}}">Pubblica un nuovo post!</a>
            </h3>
        </div>  
    </div>   
@else 
    <div class="container">


        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($posts as $post)
                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="{{ $post->cover_url ? asset('storage/' . $post->cover_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png' }}"  alt="Card image cap">
                   
                        <div class="card-body">
                        <h2 class="card-title text-uppercase">{{$post->title}} </h2>
                        <h4 class="font-italic">di {{$post->user->name}} 
                            {{ $post->category ? 'in '.$post->category->name : ' ' }} 
                        </h4>

                        {{--tags--}}

                        @if(count($post->tags) > 0)
                        @foreach($post->tags as $tag)

                            <a href="{{ route('user.posts.filter', ["tag"=>$tag->id]) }}">
                                {{ '#' . $tag->name }}
                            </a>

                        @endforeach
                        @endif
                        
                        {{----}}

                        <p>On {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }} </p>

                        @if(strlen($post->content) > 100)
                           <h5 class="card-text">{{ substr($post->content, 0, 100)."..."}}</h5>
                        @else
                           <h5 class="card-text">{{ $post->content }}</h5>
                        @endif


                        


                            @auth       
                            <div class="">       

                                <a href="{{ route('user.posts.show', $post->slug )}}" class="btn btn-primary"> More </a>
                                
                                @if(Auth::user()->id == $post->user_id)
                                <a href="{{ route('user.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> Edit </a>  
                                @endif          
                            </div>
                            @endauth

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
