<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
class PagesController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();



        $first = "mekha";

       /* return view('pages.welcome')->withFirst($first);*/
       return view('pages.welcome')->with('posts',$posts);
    }
    public function getAbout() {
        return view('pages.about');
    }
    public function getContact() {
        return view('pages.contact');
    }
    public function postContact(Request $request) {
      
        $data = array(
            'email' =>$request->email,
            'messageBody' =>$request->message,
            'subject' =>$request->subject


        );
        Mail::send('email.contact',$data,function($messsage) use ($data)
        {
            $messsage->from($data['email']);
            $messsage->to('mekhailmaged@gmail.com');
            $messsage->subject($data['subject']);

        });
       return redirect('/');
    }
}
