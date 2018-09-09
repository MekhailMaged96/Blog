<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{
    public function getIndex() {
        $posts = Post::paginate(5);
        return view('pages.blogindex')->with('posts', $posts);
    }
    public function getSingle($slug) {
        $post = Post::where('slug','=',$slug)->first();
        return view('pages.blogSingle')->with('post', $post );
    }
}
