@extends('layouts.default')
@extends('layouts.nav')

@section('content')
<div class="container">

    
@if(count($errors->all())>0) 

@foreach($errors->all() as $error)
    <h5>{{$error}}</h5>   
@endforeach
@endif
   

        <div class="myform">
                <form action ="{{route('user.posts.store')}}" method="post" enctype="multipart/form-data"> {{----}}
                    @csrf {{----}}

                    <div class="input-div">
                        <label class="my-file-upload">
                            <input type="file" name="postCover">
                            Carica un'immagine
                        </label>
                    </div>


                        <textarea name="title" class="my-form-control" aria-label="With textarea" rows="1" style="resize: none" placeholder="Inizia con un titolo"></textarea>
                                    
                        <textarea name="content" class="my-form-control" aria-label="With textarea" rows="8" placeholder="Di cosa vuoi parlare?"></textarea>

                       


                    <div class="more-info-div">

                        <div class="categories-div">
                            <label>Seleziona una categoria</label>
                            <select name="category_id" multiple size= "{{count($categories)}}" id="myCategories">
                            
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> 
                                    {{ $category->name }}
                                </option>
                                
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="tags-div">
                            @foreach($tags as $tag)
                            <div class="">
                            
                                <label class="tag-select">
                                    {{$tag->name}}
                                    <input name="tags[]" type="checkbox" value="{{$tag->id}}" >              
                                </label> 

                            </div>
                             @endforeach
                        </div>
                    
                    </div>

                    <div class="input-div">
                      <input type="submit" value="Pubblica" class="send">
                    </div>
                  
                         
                </form>
        </div>
    
</div>
@endsection

