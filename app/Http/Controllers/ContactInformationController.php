<?php

namespace App\Http\Controllers;

use App\ContactInformation;
use App\PhoneNumber;
use Illuminate\Http\Request;
use Auth;
use Session;
class ContactInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.addNewContact');
    }
  
    public function create()
    {
        return view('pages.addNewContact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        $ContactInformation = new ContactInformation;
        $ContactInformation->name =  $request->name;
        $ContactInformation->address =  $request->address;
        $ContactInformation->user_id =  Auth::user()->id;
        $ContactInformation->save();

     echo count($request->phone_number);

        if (count($request->phone_number) > 0) {
            foreach ($request->phone_number as $number) {
                $PhoneNumber= new PhoneNumber;
                $PhoneNumber->phone_number = $number;
                $PhoneNumber->ContactInformation_id = $ContactInformation->id;
                $PhoneNumber->save();
            }
        }


        Session::flash('Success','Successfully Added');
        return view('pages.addNewContact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::user()->id;
        $datas = ContactInformation::where('user_id', $id)->get();

        return view('pages.allview')->with('datas', $datas);
    }

    public function singleView($id)
    {
        
        $data = ContactInformation::find($id);
 

        return view('pages.singleView')->with('data', $data);
    }

   
    public function edit(ContactInformation $contactInformation)
    {
        //
    }

 
    public function update(Request $request, ContactInformation $contactInformation)
    {
        //
    }

    
    public function destroy(ContactInformation $contactInformation)
    {
        //
    }
}
