@extends('layouts.app')

@section('title', 'Details for '. $customer->name)
    Add New Customer


@section('content')
    <h1>Details for {{$customer->name}}</h1>
    <p><a href="/customers/{{$customer->id}}/edit">Edit customer</a></p>

    <form action="/customers/{{$customer->id}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>

    </form>

    <div>
        <p><strong>Name </strong>{{$customer->name}}</p>
        <p><strong>Email </strong>{{$customer->email}}</p>
        <p><strong>phone </strong>{{$customer->phone}}</p>
        <p><strong>Company </strong>{{$customer->company->name}}</p>
    </div>

@if($customer->image)
    <div>
        <img src="{{asset('storage/'. $customer->image)}}" alt="" class="img-thumbnail">
    </div>


@endif

@endsection
