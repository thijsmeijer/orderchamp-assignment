@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-6 mt-10 lg:mx-auto">
        @guest()
            <span>If you would like to create an account before checking out click here:</span>
            <a class="cursor-pointer text-blue-600" href="{{route('register')}}">
                Register
            </a>
        @endguest

        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-xl font-medium">Checkout details</p>
            <p class="text-gray-400">Complete your order by providing your details.</p>
            <form method="post" action="{{ route('orders.store') }}">
                @csrf
                <div>
                    <label for="name" class="mt-4 mb-2 block text-sm font-medium">Name</label>
                    <div class="relative">
                        <input type="text" id="name" name="name" value="{{ $user?->name }}" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your name" />
                    </div>

                    <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ $user?->email }}"class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
                    </div>

                    <label for="address" class="mt-4 mb-2 block text-sm font-medium">Full address</label>
                    <div class="relative">
                        <input type="text" id="address" name="address" value="{{ $user?->address }}" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your full address here" />
                    </div>

                    <label for="discount" class="mt-4 mb-2 block text-sm font-medium">Discount code</label>
                    <div class="relative">
                        <input type="text" id="discount" name="discount" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="discount code" />
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">&euro; {{ $total }}</p>
                    </div>
                </div>
                <button type="submit" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
            </form>
        </div>
    </div>
@endsection
