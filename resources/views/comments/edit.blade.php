@extends('layouts.main')

@section('content')
    <div class="row">
    {!! Form::open(['action'=>['CommentController@update',$comment->id]]) !!}
        <input type="hidden" name="_method" value="PUT">
        <div class="col-md-8 col-sm-8">


                {{ Form::label('comment','Comment:') }}
                {{Form::textarea('comment',$comment->comment,array('class'=>'form-control'))}}

                {{Form::submit('Edit',array('class'=>'btn btn-success'))}}
                {!!Html::linkRoute('posts.show','Cancel',array($comment->post->id),array('class'=>'btn btn-danger')) !!}


               
               

              
            
           
     

   
        {!! Form::close() !!}
    </div>
@endsection


