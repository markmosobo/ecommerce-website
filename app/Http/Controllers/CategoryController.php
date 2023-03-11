<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Category::select('*'))
            ->addColumn('action', 'categories.category-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('categories.categories');
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

                $categoryId = $request->id;
        
                $category   =   Category::updateOrCreate(
                            [
                            'id' => $categoryId
                            ],
                            [
                            'name' => $request->name, 
                            'image_path' => $path,
                            'sex' =>$request->sex    
                            ]);    
                                
                return Response()->json($category);

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
        $category  = Category::where($where)->first();
      
        return Response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $category = Category::where('id',$request->id)->delete();
      
        return Response()->json($category);
    }
}
