@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-xs-8">
        <img src="{{asset('images/' . $post->image)}}">
            <h2>{{$post->title}}</h2>
            <p> {!!$post->body!!} </p>
            <hr>
            <p> {{$post->catagory->name}} </p>
        </div>
        <div class="col-md-8">
            @foreach($post->comments as $comment)
            <br>
                <p><strong> name: </strong> {{$comment->name}} </p>

                <p><strong> Comment: </strong> {{$comment->comment}} </p>

            @endforeach

        </div>
        
    </div>
  
    <div class="row">
        <div class="col-md-8">
            {!!Form::open(['route'=>['comment.store',$post->id],'method'=>'POST'])!!}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name','name:') }}
                    {{ Form::text('name',null,array('class'=>'form-control')) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('email','Email:') }}
                    {{ Form::text('email',null,array('class'=>'form-control')) }}
                </div>
                <div class="col-md-12">
                    {{ Form::label('comment','Comment:') }}
                    {{ Form::textarea('comment',null,array('class'=>'form-control')) }}
              
                    <br>

                    {{ Form::submit('add your Comment',array('class'=>' btn btn-success'))}}
                </div>
            {!!Form::close()!!}
            </div>
        </div>
    </div>
 
      
@endsection