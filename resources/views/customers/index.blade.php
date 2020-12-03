@extends('layouts.app')

@section('title')
    Customers List
@endsection

@section('content')
    <h1>Customers</h1>

@can('create', \App\Models\Models\Customer::class)
    <div>
        <p><a href="/customers/create">Add Customer</a></p>
    </div>
@endcan
    <h3>Customers List</h3>
@foreach($customers as $customer)
    <div style="border-inline: 13px">

            <div>
                {{$customer->id}}

            </div>
            <div>
                @can('view', $customer)
                <a href="/customers/{{$customer->id}}">{{$customer->name}}</a>
                @endcan
                @cannot('view', $customer)
                        {{$customer->name}}
                    @endcannot
            </div>
            <div>
                {{$customer->company->name}}
            </div>
            <div>
                {{$customer->active}}
                <hr>
            </div>
    </div>
@endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">{{$customers->links()}}</div>

    </div>


@endsection
