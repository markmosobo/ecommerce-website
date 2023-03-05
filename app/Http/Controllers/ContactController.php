<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Contact::select('*'))
            ->addColumn('action', 'contact.contact-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('contact.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contactId = $request->id;
 
        $contact   =   Contact::updateOrCreate(
                    [
                     'id' => $contactId
                    ],
                    [
                    'phone_1' => $request->phone_1, 
                    'phone_2' => $request->phone_2, 
                    'email_1' => $request->email_1,
                    'email_2' => $request->email_2,
                    'address' => $request->address,
                    ]);    
                         
        return Response()->json($contact);
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
        $contact  = Contact::where($where)->first();
      
        return Response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $contact = Contact::where('id',$request->id)->delete();
      
        return Response()->json($contact);
    }
}
