@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-offset-1 col-md-8">
            <h2> Contact Us </h2>
            <hr>
        <form action="{{url('contact')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label name="email">Email address</label>
                    <input type="email" id="email" name="email" class="form-control"  placeholder="Email">
                </div>
                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input name="subject" id="subject" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea name="message"  id="message" class="form-control" placeholder="Type your message her.........."></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div> 
    </div>
@endsection
  

