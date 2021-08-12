<div class="container">
    <div class="article">
            <div class="tag-cont">
                @if(count($post->tags) > 0)
                @foreach($post->tags as $tag)

                    <a class="tag mg-btt" href="{{ route('user.posts.filter', ["tag"=>$tag->id]) }}">
                        {{ '#' . $tag->name }}
                    </a>

                    @endforeach
                @endif
            </div>

            <div class="d-flex justify-content-center">
                <h2 class="title">{{$post->title}} </h2>
            </div>

            <div class="d-flex justify-content-center">
                <h4 class="mg-btt">di  {{$post->user->name}} </h4>
            </div>

        @if($post->cover_url)
            <div class="articleImg mg-btt">
                <img src="{{ asset('storage/' . $post->cover_url) }}" class="figure-img img-fluid rounded" >
            </div>
        @endif
         
        <div class="article-cont"> 

            <div class="d-flex justify-content-between mg-btt" >
                <h4> {{ $post->category ? 'in '.$post->category->name : ' ' }} </h4>

                @if($post->updated_at)
                    <h6> Updated, {{ $post->updated_at->format('d M Y - H:i') }}</h6>
                @else
                    <h6> {{ $post->created_at->format('d M Y - H:i') }}</h6>
                @endif
               
            </div>
            
            <p class="mg-btt">{{$post->content}}</p>  

            <div class="bttns-div">
                
                    @auth {{--pulsanti azioni solo auth--}}
                    <div class="d-flex align-items-start">
            
                        @if(Auth::user()->id == $post->user_id)
                            <a href="{{ route('user.posts.edit', ['post' => $post->id]) }}" class="my-btn"> Edit </a> 
                            @include('layouts.partials.deleteBtn', [ "id" => $post->id, "resource" => "posts" ])
                        @endif

                    </div> 
                    @endauth
            </div>
        </div>
    </div>
</div>