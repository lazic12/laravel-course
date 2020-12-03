@extends('layouts.app')

@section('title')
    Add New Customer
@endsection

@section('content')
    <h1>Add New Customer</h1>

    <form action="/customers" method="post" enctype="multipart/form-data">
        @include('customers.form')
        <button type="submit" >Ad customer</button>
        @csrf
    </form>


@endsection
