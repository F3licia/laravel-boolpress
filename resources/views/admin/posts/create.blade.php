@extends('layouts.default')
@extends('layouts.nav')

 
@if(count($errors->all())>0) {{--all raccoglie tutti i dati in array!--}}

@foreach($errors->all() as $error)
    <h5>{{$error}}</h5>   
@endforeach
@endif



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <form action ="{{route('admin.posts.store')}}" method="post"> {{----}}
                @csrf {{----}}

                <div class="form-group">

                    <div class="card-header">
                        <textarea name="title" class="form-control" aria-label="With textarea" style="resize: none" placeholder="Inizia con un titolo"></textarea>
                    </div>

                    <div class="card-body">
                        <textarea name="content" class="form-control" aria-label="With textarea" rows="8" placeholder="Di cosa vuoi parlare?"></textarea>
                        <input type="submit" value="invia">
                    </div>
                </div>            
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

