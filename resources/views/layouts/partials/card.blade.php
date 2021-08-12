<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <img src="{{ asset('storage/' . $post->cover_url) }}" class="figure-img img-fluid rounded" >


                <h2 class="card-title text-uppercase">{{$post->title}} </h2>
                <h4 class="font-italic">di  {{$post->user->name}} 
                   {{ $post->category ? 'in '.$post->category->name : ' ' }} 
                </h4>

                <p>{{$post->content}}</p>  
               
                <p>Tags</p> 
                  
                    @if(count($post->tags) > 0)
                        @foreach($post->tags as $tag)

                        <a href="{{ route('user.posts.filter', ["tag"=>$tag->id]) }}">
                            {{ '#' . $tag->name }}
                          </a>

                        @endforeach
                    @else
                        <em>Nessun tag disponibile</em>
                    @endif

                <p>{{ $post->created_at->format('d M Y - H:i') }}</p>
                
                @auth       {{--pulsanti azioni solo auth--}}
                    <div class="d-flex align-items-start">
            
                        @if(Auth::user()->id == $post->user_id)
                            <a href="{{ route('user.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> Edit </a> 
                            @include('layouts.partials.deleteBtn', [ "id" => $post->id, "resource" => "posts" ])
                        @endif
                    </div> 
                @endauth
               
                </div>
            </div>
        </div>
    </div>
</div>