<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <img src="https://picsum.photos/1100/250" class="figure-img img-fluid rounded"alt="Responsive image">

                <h3 class="text-uppercase">{{$post->title}}</h3>
                <h5>di {{$post->user->name}} {{ $post->category ? 'in '. $post->category->name : ' ' }}</h5>
                <p>{{$post->content}}</p>                 
                <p>{{ $post->created_at->format('d M Y - H:i:s') }}</p>
                
                </div>
            </div>
        </div>
    </div>
</div>