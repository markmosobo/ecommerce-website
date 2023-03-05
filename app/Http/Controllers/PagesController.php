<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PagesController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $menproducts = Product::where('category_id', '8')->orWhere('category_id', '6')
        ->orWhere('category_id',4)->take(8)->get();
        $womenproducts = Product::where('category_id', '9')->orWhere('category_id', '7')
        ->orWhere('category_id',5)->take(8)->get();
        $kidproducts = Product::where('category_id', '1')->take(8)->get();
        return view('index', compact('categories', 'topcategories',
        'menproducts','womenproducts','kidproducts'));
    }

    public function products()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('pages.products', compact('products', 'categories'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function category($id)
    {
        $categoryId = Category::findOrFail($id);
        $products = Product::where('category_id', $categoryId);
        $categories = Category::all();
        return view('pages.categoryproducts', compact('products', 'categories'));
    }
}
