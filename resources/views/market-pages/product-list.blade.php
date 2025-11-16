{{--@extends('layouts.app')--}}

<div class="container mx-auto">

    <h1 class="text-2xl font-bold mb-4">Products</h1>

    <div class="grid grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="border p-4 rounded">
                <img src="{{ asset('storage/' . $product->picture) }}" alt="" class="h-40 w-full object-cover mb-2">

                <h2 class="font-semibold">{{ $product->title }}</h2>
                <p class="text-gray-600">{{ $product->year }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{--            {{ $products->links() }}--}}
    </div>

</div>
