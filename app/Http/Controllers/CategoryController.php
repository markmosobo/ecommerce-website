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
        $categoryId = $request->id;
 
        $category   =   Category::updateOrCreate(
                    [
                     'id' => $categoryId
                    ],
                    [
                    'name' => $request->name, 
                    ]);    
                         
        return Response()->json($category);
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
