<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserLog;

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
            ->addColumn('seller', function($row){
                $firstname = $row->seller->first_name;
                $lastname = $row->seller->last_name;
                return $firstname ." ". $lastname;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $categories = Category::all();
        return view('products.product', compact('categories'));
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
                        'description' => $request->description,
                        'seller_id' => Auth::user()->id
                        ]); 
                        
            $user = Auth::user();
            $time = now();
            if($user->role == 'seller')
            {
                UserLog::create([
                    'user_id' => $user->id,
                    'title' => 'Product Upload',
                    'activity' => "You uploaded product ID:$product->id - $product->name  on $time"
                ]);
            }
                            
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

        $user = Auth::user();
        $time = now();
        if($user->role == 'seller')
        {
            UserLog::create([
                'user_id' => $user->id,
                'title' => 'Product Update',
                'activity' => "You edited product ID:$product->id - $product->name  on $time"
            ]);
        }
      
        return Response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::where('id',$request->id)->delete();

        $user = Auth::user();
        $time = now();
        if($user->role == 'seller')
        {
            UserLog::create([
                'user_id' => $user->id,
                'title' => 'Product Delete',
                'activity' => "You delete product ID:$product->id - $product->name  on $time"
            ]);
        }
      
        return Response()->json($product);
    }


}
