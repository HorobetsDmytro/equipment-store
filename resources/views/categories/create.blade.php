@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Create New Category</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Category</button>
    </form>
@endsection