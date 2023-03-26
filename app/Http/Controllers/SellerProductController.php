<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(request()->ajax()) {
            return datatables()->of(Product::select('*')->where('seller_id',$user->id)->get())
            ->addColumn('action', 'products.product-action')
            ->addColumn('category', function($row){
                return $row->category->name;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $categories = Category::all();
        return view('sellerproducts.sellerproduct', compact('categories'));
    }
}
