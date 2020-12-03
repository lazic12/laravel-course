@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="new-class">{{ __('You are logged in!') }}</div>
                    <my-button text="My new text button" type="submit"></my-button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
