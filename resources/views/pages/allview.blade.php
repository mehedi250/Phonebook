@extends('pages.master.master')

@section('title')
All View
@endsection

@section('content')
                @if(session()->has('Success'))
                    <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('Success') }}
                    </div>
                @endif
        <div class="row justify-content-center">
            <div class="col-md-4">
                <ul class="list-group">
                    <a href="{{ route('ContactInformation.create') }}"><li class="list-group-item">Add New Contact</li></a>
                    <a href="{{ route('ContactInformation.show') }}"><li class="list-group-item">View All Contact</li></a>
                </ul>    
            </div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                
                    <tbody>
                    @foreach($datas as $data)
                    <tr>
                    
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        
                        <td>
                        @foreach ($data->getphones as $phone)
                        <div>{{ $phone->phone_number }}</div>
                        
                        @endforeach
                        </td>
                        <td>
                            <a href="{{ route('ContactInformation.singleView', $data->id) }}">View</a> 
                            <a class="ml-2" onclick="return confirm('Are you sure?')" href="{{ route('ContactInformation.destroy', $data->id) }}"><i class="fas fa-trash-alt  text-danger"></i></a>
                        </td>
                    </tr>
                        
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection
















