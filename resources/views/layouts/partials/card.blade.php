<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <img src="https://picsum.photos/1100/250" class="figure-img img-fluid rounded"alt="Responsive image">


                <h2 class="card-title text-uppercase">{{$post->title}} </h2>
                <h4 class="font-italic">di  {{$post->user->name}} 
                   {{ $post->category ? 'in '.$post->category->name : ' ' }} 
                </h4>

                <p>{{$post->content}}</p>  
               
                <p>Tags</p> {{--!!--}}
                  
                    @if(count($post->tags) > 0)
                        @foreach($post->tags as $tag)



                        <a href="{{ route('admin.posts.filter', ["tag"=>$tag->id]) }}">
                            {{ $tag->name }}
                          </a>

                        @endforeach
                    @else
                        <em>Nessun tag disponibile</em>
                    @endif

                <p>{{ $post->created_at->format('d M Y - H:i') }}</p>
                
                @auth
                    
                <div class="d-flex align-items-start"> 
                    <a href="{{ route('admin.posts.show', $post->slug )}}" class="btn btn-primary"> More </a>
                    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> Edit </a> 
                    @include('layouts.partials.deleteBtn', [ "id" => $post->id, "resource" => "posts" ])
                @endauth
                </div> 
                </div>
            </div>
        </div>
    </div>
</div>