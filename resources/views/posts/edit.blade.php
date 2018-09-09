@extends('layouts.main')

@section('styles')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>


@endsection

@section('content')


    <div class="row">
    {!! Form::open(['action'=>['PostController@update',$post->id],'files'=>true]) !!}
        <input type="hidden" name="_method" value="PUT">
        <div class="col-md-8 col-sm-8">
          
                {{ Form::label('title','Title:') }}
                {{ Form::text('title',$post->title,array('class'=>'form-control')) }}

                {{ Form::label('slug','Slug:') }}
                {{ Form::text('slug',$post->slug,array('class'=>'form-control')) }}

                {{ Form::label('catagory_id','Catagory:') }}
 
                <select class="form-control" name="catagory_id">
                    
                      @foreach($catagories as $catagory)
                          <option value="{{$catagory->id}}" {{ $post->catagory->id== $catagory->id ? 'selected="selected"' : '' }}>{{$catagory->name}}</option>
                        @endforeach
                </select>
               

               
                {{ Form::label('tags[]','tag:') }}
                <select class="form-control js-example-responsive" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                        
                
                      
                        
                                  <option value="{{$tag->id}}"     @foreach($post->tags as $postt) {{ $postt->id == $tag->id ? 'selected="selected"' : '' }}      @endforeach>{{$tag->name}}</option>
                        
                    @endforeach
                </select>
                
                {{ Form::label('image_uploaded','upload image:') }}
                {{ Form::file('image_uploaded') }}
                {{ Form::label('body','Post Body:') }}
                {{ Form::textarea('body',$post->body,array('class'=>'form-control','id'=>'article-ckeditor')) }}
   
            
           
            
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="well">
                   

               <dl class="dl-horizontal">
                        <dt>Create at</dt>
                        <dd>{{date ( 'M j,Y h:i a',strtotime($post->created_at) )}}</dd>
               </dl>
               <dl class="dl-horizontal">
                    <dt>Last Update</dt>
                    <dd>{{date ( 'M j,Y h:i a',strtotime($post->updated_at) )}}</dd>
               </dl>
               <hr>
               <div class="row">
                   <div class="col-sm-6 col-xs-6">
                       
                        {!!Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                   </div>
                   <div class="col-sm-6 col-xs-6">
                        {{Form::hidden('_method','PUT')}}
                        {{ Form::submit('Save',array('class' =>'btn btn-success btn btn-block','type'=>'button')) }}

                 </div>
               </div>
            </div>
        </div>
      
        {!! Form::close() !!}
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
        width: 'resolve',
        placeholder: 'Place your Tag',
   
         // need to override the changed default
    });
    

   
    </script>

@endsection
