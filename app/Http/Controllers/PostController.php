<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Catagory;
use App\Tag;
use Session;
use Purifier;
use Image;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts = Post::orderBy('id','desc')->paginate(5);


        return view('posts.index')->with('Posts',$Posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories=Catagory::all();
        $tags = Tag::all();
        return view('posts.create')->with('catagories',$catagories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,array(
            'title' =>'required|max:199',
            'body'  =>'required',
            'slug'  =>'required|unique:posts,slug|alpha_dash',
            'catagory_id' =>'required|integer',


        ));

        $post = new Post;
        $post->title=$request->title;
        $post->body=Purifier::clean($request->body);
        $post->slug=$request->slug;
        $post->catagory_id=$request->catagory_id;

        if($request->hasfile('image_uploaded'))
        {
            $image = $request->file('image_uploaded');
            $filename= time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save( $location);
            $post->image= $filename;

        }





        $post->save();
        
        $post->tags()->sync($request->tags,false);

       // Session::flash('success','The Blog Post Successfully Created');
        session()->flash('success', 'The Blog Post Successfully Created!');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
  
      
        return view('posts.show')->with('post',$post)->with('tags',$post->tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $catagories=Catagory::all();
        $tags = Tag::all();
      
        return view('posts.edit')->with('post',$post)->with('catagories',$catagories)->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($request->input('slug')== $post->slug)
        {
            $this->validate($request,array(
                'title' =>'required|max:199',
                'body'  =>'required',
               
    
    
            ));

        }
        else {
        $this->validate($request,array(
            'title' =>'required|max:199',
            'body'  =>'required',
            'slug'  =>'required|unique:posts,slug|alpha_dash',
            'catagory_id' => 'required|interger',
            'image_uploaded'=>'image',
        ));
        }
        $post = Post::find($id);
        
        $post->title=$request->input('title');
        $post->body=Purifier::clean($request->input('body'));
        $post->slug=$request->input('slug');
        $post->catagory_id=$request->input('catagory_id');

        if($request->hasfile('image_uploaded'))
        {
            $image = $request->file('image_uploaded');
            $filename= time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save( $location);
            
            $oldfile = $post->image;
            //update the database 
            $post->image= $filename;

          
            //delete the image
            Storage::delete($oldfile);

        }

        $post->save();

        if(isset($request->tags))
        {
            $post->tags()->sync($request->tags);
        }else {
            $post->tags()->sync(array());
        }
        
      
       // Session::flash('success','The Blog Post Successfully Created');
        session()->flash('success', 'The Blog Post Successfully Upated!');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        
        session()->flash('success', 'The Blog Post Successfully Deleted!');

        return redirect()->route('posts.index');

    }
}
