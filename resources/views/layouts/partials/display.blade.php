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

                         <a href="{{ route('admin.posts.filter', ["tag"=>$tag->id]) }}">
                             {{ '#' . $tag->name }}
                         </a>

                     @endforeach
                     @endif
                    
                    {{----}}

                     <p>On {{ Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }} </p>
                    <h3 class="card-text">{{ substr($post->content, 0, 100)."..."}}</h3>

                     {{--pulsanti azioni--}}

                    <div class="d-flex justify-content-center align-items-start justify-content-around"> 
                        <a href="{{ route('admin.posts.show', $post->slug )}}" class="btn btn-primary"> More </a>
                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> Edit </a> 
                    
                    </div> 
                </div>
            </div>
        @endforeach
    </div>
</div>
