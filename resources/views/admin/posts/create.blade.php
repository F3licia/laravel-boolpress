@extends('layouts.default')
@extends('layouts.nav')

 
@if(count($errors->all())>0) {{--all raccoglie tutti i dati in array!--}}

@foreach($errors->all() as $error)
    <h5>{{$error}}</h5>   
@endforeach
@endif



@section('content')
<div class="container">

   

        <div class="">
                <form action ="{{route('admin.posts.store')}}" method="post"> {{----}}
                    @csrf {{----}}

                        <textarea name="title" class="form-control" aria-label="With textarea" rows="1" style="resize: none" placeholder="Inizia con un titolo"></textarea>
                                    
                        <textarea name="content" class="form-control" aria-label="With textarea" rows="8" placeholder="Di cosa vuoi parlare?"></textarea>

                        <select name="category_id" id="">
                            <option value="">Seleziona una categoria</option>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> 
                                {{ $category->name }}
                            </option>
                            
                            @endforeach
                        </select>
                        
                       @foreach($tags as $tag)
                            <div class="form-check form-check-inline">
                            
                                <label class="form-check-label">
                                    {{$tag->name}}
                                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}" >              
                                </label> 

                            </div>
                        @endforeach

                    <input type="submit" value="invia">

                  
                         
                </form>
        </div>
    
</div>
@endsection

