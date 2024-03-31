@extends('layouts.app')

@section('content')

    @foreach($cart as $product)
        <div>
            <span>
                {{ $product->name }} - &euro; {{ $product->price }}
            </span>

        </div>
    @endforeach

    <form method="POST" action="{{ route('checkout') }}">
        @csrf
        <button type="submit"
                class="block rounded p-2 text-center text-white bg-blue-500 hover:bg-blue-600 duration-100 rounded"
        >
            Checkout
        </button>
    </form>
@endsection
