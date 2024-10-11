<!-- orders/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Edit Order</h2>

    <form action="{{ route('orders.update', $order) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="customer_id" class="block text-gray-700 text-sm font-bold mb-2">Customer</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('customer_id') border-red-500 @enderror" id="customer_id" name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Products</label>
            @foreach($products as $product)
                <div class="flex items-center mb-2">
                    <input class="mr-2 leading-tight" type="checkbox" name="products[]" value="{{ $product->id }}" id="product{{ $product->id }}"
                        {{ $order->products->contains($product->id) ? 'checked' : '' }}>
                    <label class="text-sm" for="product{{ $product->id }}">
                        {{ $product->name }} - {{ $product->price }}₴ (Available: {{ $product->amount + ($order->products->where('id', $product->id)->first()->pivot->quantity ?? 0) }})
                    </label>
                    <input type="number" name="quantities[{{ $product->id }}]" 
                           value="{{ $order->products->where('id', $product->id)->first()->pivot->quantity ?? 0 }}" 
                           min="0" 
                           max="{{ $product->amount + ($order->products->where('id', $product->id)->first()->pivot->quantity ?? 0) }}" 
                           class="shadow appearance-none border rounded w-20 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-2"
                           {{ $order->products->contains($product->id) ? '' : 'disabled' }}>
                </div>
            @endforeach
            @error('products')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Update Order
            </button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const quantities = document.querySelectorAll('input[type="number"]');

            checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function() {
                    quantities[index].disabled = !this.checked;
                    if (!this.checked) {
                        quantities[index].value = 0;
                    }
                });
            });
        });
    </script>
@endsection