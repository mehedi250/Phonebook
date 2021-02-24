@extends('pages.master.master')


@section('title')
Single View
@endsection



@section('content')

            @if(session()->has('Success'))
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('Success') }}
                </div>
            @endif
            <h3 class="text-center">Record of {{ $data->name }}</h3>  
            <div class="border ">
                <div class="row m-1" style="background-color: rgba(0, 0, 0, 0.2);">
                    <div class="col-8"><h4 class="text-black">Basic Info</h4></div>
                    <div class="col-4 text-right"><a class="" href="{{ route('ContactInformation.edit', $data->id) }}"><i class="fas fa-edit fa-2x text-success"></i></a></h4></div>
                </div>

                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><p>Name : <span>{{ $data->name }}</span></li>
                        <li class="list-group-item"><p>Address : <span>{{ $data->address }}</span></li>
                    </ul>
                </div>
            </div>

            <div class="border mb-2">
                <div class="row m-1 bg-secondary">
                    <div class="col-8"><h4 class="text-light">Phone Number</h4></div>
                    <div class="col-4 text-right"></h4></div>
                </div>

                <div>
                    <ul class="list-group list-group-flush d-flex">
                    @foreach ($data->getphones as $phone)
                        <li class="list-group-item"> <div class="row">
                            <div class="col-md-8">
                                <p class="mr-5">{{  $phone->phone_number }}</p>
                           </div>
                            <div class="col-md-4 text-right">
                                <a class=" " href="{{ route('PhoneNumber.edit', $phone->id) }}"><i class="fas fa-edit fa-2x text-success"></i></a>
                                <a class="" onclick="return confirm('Are you sure?')" href="{{ route('PhoneNumber.destroy', $phone->id) }}"><i class="fas fa-trash-alt fa-2x text-danger"></i></a>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div>
                <a class="btn btn-success text-light" href="{{ route('PhoneNumber.create',$data->id) }}"><i class="fas fa-plus-square text-light"></i> Add New Number</a>
            </div>

@endsection