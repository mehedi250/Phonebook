@extends('pages.master.master')

@section('title')
Update Contact Information
@endsection



@section('content')
                @if ($errors->any())
                   <div class="alert alert-danger">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              
   
        <div class="m-4 border ">
            <form  class="m-4" action="{{ route('ContactInformation.update',$data->id) }}" method="POST">
            <h3 class="m-1 p-4"><i class="fas fa-address-book"></i> Update Contact</h3>
            @csrf

                <div class="form-group">
                    <label for="name">Contact Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Contact Name" value="{{ $data->name }}" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter Address"  value="{{ $data->address }}" name="address" id="address">
                </div>

                

                <div class="text-center form-group" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
@endsection
