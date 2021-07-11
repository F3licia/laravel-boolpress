

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
        <div class="d-flex flex-wrap justify-content-around">
        
            @foreach($posts as $post)
            
                <div class="card mb-auto p-2" style="width: 18rem">
                    <img class="card-img-top" src="{{ asset('storage/' . $post->cover_url) }}"  alt="Card image cap">
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
                        <h3 class="card-text">{{ substr($post->content, 0, 100)."..."}}</h3>

                        @auth       
                            <div class="d-flex justify-content-center align-items-start justify-content-around">       

                                <a href="{{ route('user.posts.show', $post->slug )}}" class="btn btn-primary"> More </a>
                                
                                @if(Auth::user()->id == $post->user_id)
                                <a href="{{ route('user.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> Edit </a>  
                                @endif          
                            </div>
                        @endauth

                    </div>
                </div>
            @endforeach
        </div>
@endif
