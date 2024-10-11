@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Edit Product</h2>

    <form action="{{ route('products.update', $product) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" id="description" name="description" value="{{ old('description', $product->description) }}" required>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('price') border-red-500 @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('amount') border-red-500 @enderror" id="amount" name="amount" value="{{ old('amount', $product->amount) }}" required>
            @error('amount')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category_id') border-red-500 @enderror" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Brand</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('brand_id') border-red-500 @enderror" id="brand_id" name="brand_id" required>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <!-- Repeat for other fields: description, price, amount, category_id, brand_id -->
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Product
            </button>
        </div>
    </form>
@endsection
