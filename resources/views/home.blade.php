@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! See all products ') }} <a class="text-blue-800" href="{{ route('products.index') }}">here</a>

                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('My information') }}</div>

                <div class="card-body flex flex-col">
                    <span> Name: {{ $user->name }} </span>
                    <span> Email: {{ $user->email }} </span>
                    <span> Address: {{ $user->address }} </span>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
