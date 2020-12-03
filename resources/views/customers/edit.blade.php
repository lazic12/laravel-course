@extends('layouts.app')

@section('title')
    Edit Details for . {{$customer->name}}
@endsection

@section('content')
    <h1>Edit details for {{$customer->name}}</h1>

{{--    <form action="/customers/{{$customer->id}}" method="post">--}}
    <form action="{{route('customers.update', ['customer'=>$customer])}}" enctype="multipart/form-data" method="post">
        @method('PATCH')
        @include('customers.form')
        <button type="submit" >Save customer</button>
        @csrf
    </form>


@endsection
