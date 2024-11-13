<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use App\Models\Brand;    
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['brand', 'category']);

        // Фільтрація за брендом
        if ($request->has('brand') && !empty($request->brand)) {
            $query->whereIn('brand_id', $request->brand);
        }

        // Фільтрація за категорією
        if ($request->has('category') && !empty($request->category)) {
            $query->whereIn('category_id', $request->category);
        }

        // Фільтрація за ціною
        if ($request->has('price_from') && !empty($request->price_from)) {
            $query->where('price', '>=', $request->price_from);
        }
        if ($request->has('price_to') && !empty($request->price_to)) {
            $query->where('price', '<=', $request->price_to);
        }

        // Сортування
        $sortField = 'created_at';
        $sortDirection = 'desc';

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $sortField = 'price';
                    $sortDirection = 'asc';
                    break;
                case 'price_desc':
                    $sortField = 'price';
                    $sortDirection = 'desc';
                    break;
            }
        }

        $products = $query->orderBy($sortField, $sortDirection)->paginate(12);
        $brands = Brand::all();
        $categories = Category::all();

        return view('welcome', compact('products', 'brands', 'categories'));
    }
}
