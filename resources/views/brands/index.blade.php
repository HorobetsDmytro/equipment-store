@extends('layouts.app')

@section('content')
    <h1>Brands</h1>
    <a href="{{ route('brands.create') }}" class="btn btn-primary">Create New Brand</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->description }}</td>
                    <td>
                        <a href="{{ route('brands.show', $brand) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $brands->links() }}
@endsection