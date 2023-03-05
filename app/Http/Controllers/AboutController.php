<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(About::select('*'))
            ->addColumn('action', 'about.about-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('about.about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aboutId = $request->id;
 
        $about   =   About::updateOrCreate(
                    [
                     'id' => $aboutId
                    ],
                    [
                    'short_description' => $request->short_description, 
                    'quote' => $request->quote, 
                    'long_description' => $request->long_description,
                    ]);    
                         
        return Response()->json($about);
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
    public function edit(Request $request, string $id)
    {
        $where = array('id' => $request->id);
        $about  = About::where($where)->first();
      
        return Response()->json($about);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $about = About::where('id',$request->id)->delete();
      
        return Response()->json($about);
    }
}
