<div class="container">
    <div class="d-flex flex-wrap justify-content-around">
        
        @foreach($posts as $post)
            <div class="card mb-auto p-2" style="width: 18rem">
                <img class="card-img-top" src="https://picsum.photos/200/100" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title text-uppercase">{{$post->title}} </h2>
                    <h4 class="font-italic">di {{$post->user->name}} 
                        {{ $post->category ? 'in '.$post->category->name : ' ' }} 
                     </h4>
                    
                    <p>On {{ $post->created_at->format('d M Y') }}</p>
                    <h3 class="card-text">{{ substr($post->content, 0, 100)."..."}}</h3>
                    
                    <div class="d-flex justify-content-center align-items-start justify-content-around"> 
                        <a href="{{ route('admin.posts.show', $post->slug )}}" class="btn btn-primary"> More </a>
                        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary"> Edit </a> 
                        @include('layouts.partials.deleteBtn', [ "id" => $post->id, "resource" => "posts" ])
                    </div> 
                </div>
            </div>
        @endforeach
    </div>
</div>
