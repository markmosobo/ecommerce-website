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
        $validatedData = $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
            ]);

        if($request->TotalImages > 0)
        {
                
            for ($x = 0; $x < $request->TotalImages; $x++) 
            {
    
                if ($request->hasFile('images'.$x)) 
                {
                    $file      = $request->file('images'.$x);
    
                    $path = $file->store('public/images');
                    $name = $file->getClientOriginalName();
    
                }
            }    
            $productId = $request->id;
    
            $product   =   Product::updateOrCreate(
                        [
                        'id' => $productId
                        ],
                        [
                        'name' => $request->name, 
                        'price' => $request->price, 
                        'quantity' => $request->quantity,
                        'category_id' => $request->category_id,
                        'image_path' => $path,
                        'photo' => $name,
                        'description' => $request->description
                        ]);    
                            
            return Response()->json($product);

        }  
        else{
            return response()->json(["message" => "Please try again."]);
        } 
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
    public function destroy(Request $request)
    {
        $product = Product::where('id',$request->id)->delete();
      
        return Response()->json($product);
    }
}
