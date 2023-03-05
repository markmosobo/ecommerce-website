<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Product::select('*'))
            ->addColumn('action', 'products.product-action')
            ->addColumn('category', function($row){
                return $row->category->name;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $categories = Category::all();
        return view('products.products', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->id;
 
        $product   =   Product::updateOrCreate(
                    [
                     'id' => $productId
                    ],
                    [
                    'name' => $request->name, 
                    'price' => $request->price, 
                    'quantity' => $request->quantity,
                    'category_id' => $request->category_id
                    ]);    
                         
        return Response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $product  = Product::where($where)->first();
      
        return Response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id',$request->id)->delete();
      
        return Response()->json($product);
    }
}
