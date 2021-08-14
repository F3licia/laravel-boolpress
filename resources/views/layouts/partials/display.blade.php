
@if(count($posts) == 0)
    <div class="container">
        <div class="d-flex flex-wrap justify-content-around">
            <h3>
                Pare non ci sia nulla qui, è il momento di rimediare!
                <a href="{{route('user.posts.create')}}">Pubblica un nuovo post!</a>
            </h3>
        </div>  
    </div>   
@else 

    <div class="display">

        @foreach($posts as $post)

            <div class="my-card">

                <div class="tag-div">
                    {{--tags--}}
                        @if(count($post->tags) > 0)
                        @foreach($post->tags as $tag)
                
                            <a class="tag" href="{{ route('user.posts.filter', ["tag"=>$tag->id]) }}">
                                {{ '#' . $tag->name }}
                            </a>
                
                        @endforeach
                        @endif    
                    {{----}}
                </div>

                <div class="img-cont">
                    <img class="" src="{{ $post->cover_url ? asset('storage/' . $post->cover_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png' }}"  alt="Card image cap">
                </div>

                <div class="article-cont">

                    <h2 class="title">{{$post->title}} </h2>

                    <div class="d-flex justify-content-between info" >
                        <h5>di {{$post->user->name}} 
                            {{ $post->category ? 'in '.$post->category->name : ' ' }} 
                        </h5>

                        <h5>On {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }} </h5>
                    </div>

                    <div class="card-p">
                        @if(strlen($post->content) > 170)
                           <p>{{ substr($post->content, 0, 170)."..."}}</p>
                        @else
                           <p>{{ $post->content }}</p>
                        @endif
                    </div>

                        @auth        
                        <div class="bttns-div">       
                                <a href="{{ route('user.posts.show', $post->slug )}}" class="my-btn"> More </a> 
                                                               
                                @if(Auth::user()->id == $post->user_id)
                                    <a href="{{ route('user.posts.edit', ['post' => $post->id]) }}" class="my-btn"> Edit </a>  
                                @endif          
                        </div>
                        @endauth
                </div>

            </div>
               
        @endforeach
    </div>

@endif
