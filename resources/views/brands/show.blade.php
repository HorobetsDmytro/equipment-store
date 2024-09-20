@extends('layouts.app')

@section('content')
    <h1>Brand Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $brand->name }}</h5>
            <p class="card-text">{{ $brand->description }}</p>
        </div>
    </div>

    <h2 class="mt-4">Products</h2>

    @if($brand->products->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brand->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products found for this brand.</p>
    @endif

    <a href="{{ route('brands.index') }}" class="btn btn-secondary mt-3">Back to Brands</a>
@endsection