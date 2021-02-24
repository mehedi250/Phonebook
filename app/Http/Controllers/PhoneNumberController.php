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
        return view('pages.add_number')->with('data', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    { 
        $request->validate([
            'phone_number.*' => 'required|unique:phone_numbers,phone_number',
        ]);

        if (count($request->phone_number) > 0) {
            $i=0;
            foreach ($request->phone_number as $number) {
                $request->validate([
                    'phone_number.'.$i => 'required|unique:phone_numbers,phone_number',
                ]);
                $i++;
                
                $PhoneNumber= new PhoneNumber;
                $PhoneNumber->phone_number = $number;
                $PhoneNumber->ContactInformation_id = $id;
                $PhoneNumber->save();
            }
        }


        Session::flash('Success','Successfully Added');
        return redirect()->route('ContactInformation.singleView',$id);

    }

    
    public function show()
    {
        //
    }


    public function edit($id)
    {
        $data = PhoneNumber::find($id);
        return view('pages.edit_number')->with('data', $data);
    }

   
    public function update(Request $request,$id)
    {
        $request->validate([
            'phone_number' => 'required|unique:phone_numbers,phone_number',
        ]);

        $info = PhoneNumber::find($id);
        $info->phone_number =  $request->phone_number;
        $info->save();
        Session::flash('Success','Successfully Updated Number');
        return redirect()->route('ContactInformation.singleView',$info->ContactInformation_id);
    }

  
    public function destroy($id)
    {
        $info = PhoneNumber::where('id',$id)->delete();

        Session::flash('Success','Successfully Deleted Number');
  
       return redirect()->back();
    }
}
