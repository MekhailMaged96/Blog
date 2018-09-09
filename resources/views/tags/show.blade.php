@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-md-8">
                 <h2>{{$tag->name}} : <small> {{$tag->posts()->count()}} Posts </small></h2>
        </div>
        <div class="col-md-2">
            <a style="margin-top:20px;" href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary">Edit </a>
        </div>
        <div class="col-md-2">
            {{  Form::open(array('route' => array('tags.destroy', $tag->id))) }}

            {{Form::hidden('_method','DELETE')}}
            {{ Form::submit('Delete',array('class' =>'btn btn-danger','type'=>'button','style'=>'margin-top:20px;')) }}
            {{ Form::close() }}

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <hr>
                <table class="table">
                    <thead> 
                        <tr>
                            <th># </th>
                            <th>Name </th>
                            <th>tags </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tag->posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                          
                            <td>@foreach($post->tags as $tag)
                                <h3  style="display:inline; padding:3px;"><span class="label label-default"> {{ $tag->name }} </span> </h3>
                                @endforeach 
                            </td>

                            <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default">View </a></td>

                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>



        </div>
     
    </div>
@endsection

