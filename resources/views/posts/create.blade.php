@extends('layouts.main')

@section('styles')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

@endsection

@section('content')
<div class="row">
    <div class="col-md-offset-1 col-md-7 "> 
    {!! Form::open(array('route' => 'posts.store','files'=>true)) !!}

        {{ Form::label('title','Title:') }}
        {{ Form::text('title',null,array('class'=>'form-control')) }}

        {{ Form::label('slug','Slug:') }}
        {{ Form::text('slug',null,array('class'=>'form-control')) }}

        {{ Form::label('catagory_id','Catagory:') }}
            
            <select class="form-control" name="catagory_id">
                @foreach($catagories as $catagory)
                  <option value="{{$catagory->id}}">{{$catagory->name}}</option>
                @endforeach
            </select>

        {{ Form::label('name[]','tag:') }}
            
            <select class="form-control js-example-responsive" name="tags[]"  multiple="multiple" style="width: 100%" >
                @foreach($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>

        {{ Form::file('image_uploaded')}}
        {{ Form::label('body','Post Body:') }}
        {{ Form::textarea('body',null,array('class'=>'form-control','id'=>'article-ckeditor')) }}

        <br>
        {{ Form::submit('Create Post',array('class' =>'btn btn-success','type'=>'button')) }}

    {!! Form::close() !!}

    </div>
</div>


@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
<script>


    $(".js-example-responsive").select2({
        width: 'resolve' // need to override the changed default
    });
    
    </script>

@endsection
