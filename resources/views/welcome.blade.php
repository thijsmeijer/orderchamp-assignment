@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="max-w-6xl mx-6 mt-10 lg:mx-auto">
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold">Alle producten</h2>
                    @if($cart)
                        <a href="{{ route('carts.show') }}" class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 cursor-pointer">Cart</a>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                    @foreach($products as $product)
                        <div
                            class="overflow-hidden rounded-md shadow-xl flex flex-col"
                        >
                            <div class="relative bg-gray-900">
                                <img
                                    src="https://unsplash.com/photos/pink-balloon-tied-on-white-wooden-chair-nptLmg6jqDo"
                                    class="h-auto w-full"
                                    alt="Product"
                                />
                            </div>
                            <div class="flex flex-col justify-between p-5 h-full">
                                <div>
                                    <h2 class="text-lg font-medium leading-none text-slate-500 mb-4">
                                        {{ $product->name }}
                                    </h2>
                                </div>
                                <div class="space-y-0.5">
                                    <dl class="flex items-center space-x-2 text-sm">
                                        <dt>
                                            <span>Price</span>
                                        </dt>
                                        <dd>
                                            <span>&euro; {{ $product->price }}</span>
                                        </dd>
                                    </dl>

                                    <dl class="flex items-center space-x-2 text-sm">
                                        <dt>
                                            <span>Stock</span>
                                        </dt>
                                        <dd>
                                            <span>{{ $product->stock }}</span>
                                        </dd>
                                    </dl>

                                    <dl class="flex items-center space-x-2 text-sm">
                                        <dt>
                                            <div class="pt-4 mb-4">
                                                <form method="POST" action="{{ route('carts.add-to-cart', $product) }}">
                                                    @csrf
                                                    <button type="submit"
                                                       class="w-full block rounded p-2 text-center text-white bg-blue-500 hover:bg-blue-600 duration-100 rounded"
                                                    >
                                                        Add to cart
                                                    </button>
                                                </form>

                                            </div>
                                        </dt>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


