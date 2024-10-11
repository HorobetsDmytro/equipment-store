@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Category Details</h2>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $category->name }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $category->description }}</p>
        </div>
    </div>

    <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-6 mb-4">Products in this Category</h3>

    @if($category->products->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($category->products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->brand->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('products.show', $product) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">No products found in this category.</p>
    @endif

    <a href="{{ route('categories.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Back to Categories</a>
@endsection