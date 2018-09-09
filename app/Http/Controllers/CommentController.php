<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        $this->validate($request,array(
            'comment' =>'required|max:199',
            'name'  =>'required',
            'email'  =>'required|email',
            


        ));
        $post= Post::find($post_id);
        $comment = new Comment;

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved=true; 
        $comment->post()->associate($post);
        $comment->save();
        session()->flash('success', 'Comment Successfully created!');
        return redirect()->route('blog.single',$post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        $comment = Comment::find($id);

        return view('comments.edit')->with('comment',$comment);
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
        
        $this->validate($request,array(
            'comment' =>'required|max:199',
          


        ));

        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->comment = $request->comment;
        $comment->save();
        session()->flash('success', 'Comment Successfully updated!');
        return redirect()->route('posts.show', $post_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        $comment = Comment::find($id);

        return view('comments.delete')->with('comment',$comment);

    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        $post_id = $comment->post->id;
        session()->flash('success', 'Comment Successfully deleted!');
        return redirect()->route('posts.show',$post_id);
        //
    }
}
