<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tech Shop')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="text-lg font-semibold text-gray-800">Tech Shop</a>
                        </div>
                        
                        @auth
                            @if(auth()->user()->is_admin)
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300">Products</a>
                                    <a href="{{ route('categories.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300">Categories</a>
                                    <a href="{{ route('brands.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300">Brands</a>
                                    <a href="{{ route('orders.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300">Orders</a>
                                    <a href="{{ route('customers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300">Customers</a>
                                </div>
                            @endif
                        @endauth
                    </div>

                    <div class="flex items-center">
                        @auth
                            <div class="flex items-center space-x-4">
                                @if(auth()->user()->is_admin)
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Admin</span>
                                @endif
                                <span class="text-gray-600">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700 mr-4">Log in</a>
                            <a href="{{ route('register') }}" class="text-sm text-gray-500 hover:text-gray-700">Sign up</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>