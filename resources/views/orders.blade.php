@extends('layouts.app')

@section('content')
    <span class="text-xl font-bold">Orders</span>
    @foreach($orders as $order)
        <div class="bg-white mx-4 my-2">
            Order {{ $loop->iteration }}
            @foreach($order->orderLines as $orderLine)
                <div class="flex flex-col">
                   Product name: {{ $orderLine->product->name }}
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
