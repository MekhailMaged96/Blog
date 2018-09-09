@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-offset-2 col-md-offset-2  col-md-8 col-sm-8">
            <h2>Blog </h2>
            
            @foreach($posts as $post)
            
             <h3>{{$post->title}} </h3>
             <span >Published at : </span><p style="display:inline;">{{date ( 'M j,Y h:i a',strtotime($post->updated_at) )}}</p>

             <p> {!!$post->body!!}  </p>
             <a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Read More </a>
            <hr>
            
            @endforeach

          
        </div>
       

            
                     
                  
                    
      


        
        </div>
    </div>
@endsection