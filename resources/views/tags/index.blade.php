@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Tags </h2>
            <hr>
            <table class="table">
                <thead> 
                    <tr>
                        <th># </th>
                        <th>Name </th>
                    </tr>
                </thead>

                <tbody>
                   
                    @foreach($tags as $tag )
                    <tr>
                            <th> {{$tag->id}} </th>
                            <th><a href="{{route('tags.show',$tag->id)}}" > {{$tag->name}} </a></th>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>



        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(array('route' => 'tags.store')) !!}

                {{ Form::label('name','Name:') }}
                {{ Form::text('name',null,array('class'=>'form-control')) }}
    
        
                <br>
                {{ Form::submit('Create',array('class' =>'btn btn-success','type'=>'button')) }}
        
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

