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
        $id = Auth::user()->id;
        $datas = ContactInformation::where('user_id', $id)->get();
        return view('pages.allview')->with('datas', $datas);
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
            'phone_number.*' => 'required|unique:phone_numbers,phone_number',
        ]);
        $ContactInformation = new ContactInformation;
        $ContactInformation->name =  $request->name;
        $ContactInformation->address =  $request->address;
        $ContactInformation->user_id =  Auth::user()->id;
        $ContactInformation->save();

        if (count($request->phone_number) > 0) {
            $i=0;
            foreach ($request->phone_number as $number) {
                $request->validate([
                    'phone_number.'.$i => 'required|unique:phone_numbers,phone_number',
                ]);
                $i++;
                
                $PhoneNumber= new PhoneNumber;
                $PhoneNumber->phone_number = $number;
                $PhoneNumber->ContactInformation_id = $ContactInformation->id;
                $PhoneNumber->save();
            }
        }


        Session::flash('Success','Successfully Added');
        return redirect()->route('ContactInformation.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactInformation  $contactInformation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ContactInformation::find($id);
        return view('pages.singleView')->with('data', $data);
    }

    public function singleView($id)
    {
        
        
    }

   
    public function edit($id)
    {
        $data = ContactInformation::find($id);
        return view('pages.edit_info')->with('data', $data);
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        $info = ContactInformation::find($id);
        $info->name =  $request->name;
        $info->address =  $request->address;
        $info->save();
        Session::flash('Success','Successfully Updated');
        return redirect()->route('ContactInformation.singleView',$id);

    }

    
    public function destroy($id)
    {

        $info= ContactInformation::where('id',$id)->delete();
        $info2 = PhoneNumber::where('ContactInformation_id',$id)->delete();

        Session::flash('Success','Successfully Delete');
        return redirect()->back();
    }
}
