@extends('layouts.main')

@section('content')
<div class="row">
    <div class="row">
        <div class="col-md-10 col-sm-10">
            <h2> all Posts </h2>
        </div>
        <div class="col-md-2 col-sm-10">
            <a href="{{route('posts.create')}}" style="margin: 20px; padding:10px;" class="btn btn-primary">create Post </a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
           
                
                
                <!-- Table -->
                <table class="table" style="overflow-x:auto;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post Title </th>
                            <th>Post Body </th>
                            <th>Created at </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Posts as $post)    
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{!!$post->body!!}</td>
                                <td>{{date ( 'M j,Y h:i a',strtotime($post->created_at) )}} </td>
                                <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default">View</a>
                                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-default">Edit</a>  </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
         
        <div class="text-center">
            {{$Posts->links() }}
        </div>
    </div>
</div>
    
@endsection   


