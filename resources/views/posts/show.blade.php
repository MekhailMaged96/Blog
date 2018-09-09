@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <h2>{{$post->title}}</h2>
            <p> {!!$post->body!!} </p>
            <hr>
            @foreach($tags as $tag)

             <h3 style="display:inline"><span class="label label-default">{{$tag->name}}</span></h3>

            @endforeach
            <h2>Comments </h2>
            <table class="table">
                <thead>
                    <th>name</th>
                    <th>Email </th>
                    <th>Comment</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->name}} </td>
                        <td>{{$comment->email}} </td>
                        <td>{{$comment->comment}} </td>
                         <td><a href="{{route('comment.edit',$comment->id)}}" class="btn btn-success">edit</a></td>
                         <td><a href="{{route('comment.delete',$comment->id)}}"><i class="fa fa-remove" style="font-size:24px; color:red; margin-top:2px;"></i></a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            
            
               


          
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a  href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></p>
                </dl>  

               <dl class="dl-horizontal">
                        <dt>Create at</dt>
                        <dd>{{date ( 'M j,Y h:i a',strtotime($post->created_at) )}}</dd>
               </dl>
               <dl class="dl-horizontal">
                    <dt>Last Update</dt>
                    <dd>{{date ( 'M j,Y h:i a',strtotime($post->updated_at) )}}</dd>
               </dl>
               <dl class="dl-horizontal">
                    <dt>Catagory:</dt>
                    <dd>{{$post->catagory->name}}</dd>
               </dl>
               <hr>
               <div class="row">
                   <div class="col-sm-6 col-xs-6">
                    

                        {!!Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                   </div>
                   <div class="col-sm-6 col-xs-6">
                    {{  Form::open(array('route' => array('posts.destroy', $post->id))) }}

                        {{Form::hidden('_method','DELETE')}}
                        {{ Form::submit('Delete',array('class' =>'btn btn-danger btn btn-block','type'=>'button')) }}
                    {{ Form::close() }}
                 </div>
                 
             
               </div>
               <br>
               <div class="row">
                    <div class="col-sm-12">
                            {!!Html::linkRoute('posts.index','Show all posts',null,array('class'=>'btn btn-success btn-block')) !!}
                     </div>
               </div>
            </div>
        </div>
    </div>
   
@endsection