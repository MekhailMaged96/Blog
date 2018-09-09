@extends('layouts.main')

@section('content')
    <div class="row">
    {!! Form::open(['action'=>['CommentController@destroy',$comment->id]]) !!}
        <input type="hidden" name="_method" value="delete">
        <div class="col-md-8 col-sm-8">
            <h2> are you sure to Delete comment </h2>

                {{Form::submit('Delete',array('class'=>'btn btn-danger'))}}
                {!!Html::linkRoute('posts.show','Cancel',array($comment->post->id),array('class'=>'btn btn-danger')) !!}


               
               

              
            
           
     

   
        {!! Form::close() !!}
    </div>
@endsection


