@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-4">
        <!-- Sidebar with filters -->
        <div class="w-full md:w-1/4 px-4">
            <div class="bg-white rounded-lg shadow p-6">
                <form action="{{ route('home') }}" method="GET" class="space-y-6">
                    <!-- Sort -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Сортування</h3>
                        <select name="sort" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onchange="this.form.submit()">
                            <option value="">За замовчуванням</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Ціна: від низької до високої</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Ціна: від високої до низької</option>
                        </select>
                    </div>

                    <!-- Price Filter -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Ціна</h3>
                        <div class="flex space-x-2">
                            <input type="number" name="price_from" placeholder="Від" value="{{ request('price_from') }}" 
                                   class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <input type="number" name="price_to" placeholder="До" value="{{ request('price_to') }}"
                                   class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>

                    <!-- Brand Filter -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Бренди</h3>
                        <div class="space-y-2 max-h-48 overflow-y-auto">
                            @foreach($brands as $brand)
                            <div class="flex items-center">
                                <input type="checkbox" name="brand[]" value="{{ $brand->id }}" 
                                       {{ (is_array(request('brand')) && in_array($brand->id, request('brand'))) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <label class="ml-2 text-sm text-gray-600">{{ $brand->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Категорії</h3>
                        <div class="space-y-2 max-h-48 overflow-y-auto">
                            @foreach($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                       {{ (is_array(request('category')) && in_array($category->id, request('category'))) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <label class="ml-2 text-sm text-gray-600">{{ $category->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Застосувати фільтри
                    </button>

                    <!-- Reset Filters -->
                    <a href="{{ route('home') }}" class="block w-full text-center text-sm text-gray-600 hover:text-gray-900 mt-2">
                        Скинути фільтри
                    </a>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="w-full md:w-3/4 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $product->description }}</p>
                        <div class="mt-2">
                            <span class="text-gray-600 text-sm">Бренд: {{ $product->brand->name }}</span>
                            <br>
                            <span class="text-gray-600 text-sm">Категорія: {{ $product->category->name }}</span>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-lg font-bold text-indigo-600">{{ number_format($product->price, 2) }}₴</span>
                            <span class="text-sm text-gray-500">В наявності: {{ $product->amount }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection