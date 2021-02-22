<?php

namespace App\Http\Controllers;

use App\PhoneNumber;
use Illuminate\Http\Request;
use Session;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('pages.add_Number')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    { 
        $request->validate([
            'phone_number' => 'required',
        ]);
        $PhoneNumber= new PhoneNumber;
        $PhoneNumber->phone_number = $request->phone_number;;
        $PhoneNumber->ContactInformation_id = $id;
        $PhoneNumber->save();
        Session::flash('Success','Successfully Added');
        return view('pages.add_Number')->with('id',$id);

    }

    
    public function show(PhoneNumber $phoneNumber)
    {
        //
    }


    public function edit(PhoneNumber $phoneNumber)
    {
        //
    }

   
    public function update(Request $request, PhoneNumber $phoneNumber)
    {
        //
    }

  
    public function destroy(PhoneNumber $phoneNumber)
    {
        //
    }
}
