@extends('layouts.app')

@section('title')
    Contact Us
@endsection
@section('content')

    <h3>Contact Us</h3>
@if(! session()->has('message'))
    <form action="{{route('/contact.store')}}" method="post">
        <p>Name:</p>
        <input type="text" name ="name" value="{{old('name')}}">
        <br>{{$errors->first('name')}}
        <p>Email:</p>
        <input type="text" name ="email" value="{{old('email')}}">
        <br>{{$errors->first('email')}}
        <div>
            <br>
            <label for="message">Message:</label><br>
            <textarea name="message" id="message" cols="30" rows="10">{{old('message')}}</textarea>
            <br>{{$errors->first('message')}}
        </div>
        @csrf
        <button type="submit">Send Message</button>

    </form>
@endif

@endsection
