@extends('layouts.main')

@section('content')


    <div class="row">
    {!! Form::open(['action'=>['TagController@update',$tag->id]]) !!}
        <input type="hidden" name="_method" value="PUT">
        <div class="col-md-8 col-sm-8">
          
                {{ Form::label('name','Name:') }}
                {{ Form::text('name',$tag->name,array('class'=>'form-control')) }}
                {{ Form::hidden('_method','PUT')}}
                <br>
                {{ Form::submit('Save',array('class' =>'btn btn-success btn btn-block','type'=>'button')) }}

        </div>

    {!! Form::close() !!}

        
    </div>
      
    
@endsection


