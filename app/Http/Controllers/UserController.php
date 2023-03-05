<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Datatables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(User::select('*'))
            ->addColumn('action', 'users.user-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('users.users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = $request->id;
 
        $user   =   User::updateOrCreate(
                    [
                     'id' => $userId
                    ],
                    [
                    'first_name' => $request->first_name, 
                    'last_name' => $request->last_name, 
                    'email' => $request->email,
                    'role' => $request->role,
                    'password' => Hash::make('123456')
                    ]);    
                         
        return Response()->json($user);
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
        $user  = User::where($where)->first();
      
        return Response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id',$request->id)->delete();
      
        return Response()->json($user);
    }
}
