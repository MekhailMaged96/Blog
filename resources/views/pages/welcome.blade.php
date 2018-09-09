@extends('layouts.main')

@section('content')
   
        <div class="row">
            <div class="col-md-12 col-xs-11">
                <div class="jumbotron">
                    <h1>Hello, world!</h1>
                    <p><a class="btn btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-xs-5 col-sm-8">
            
                @foreach($posts as $post)
                    <h2>{{$post->title}} </h2>
                    <p class="lead">{!!$post->body!!}</p>
                    <p><a class="btn btn-primary" href=" {{route('blog.single',$post->slug)}} " role="button">Learn more</a></p>
                    
                @endforeach
            </div>
            <div class="col-md-2 col-md-offset-1  col-xs-5  col-xs-offset-1 col-sm-3 col-sm-offset-1">
                <h2>side bar </h2>
                
            </div>
        </div>
@endsection