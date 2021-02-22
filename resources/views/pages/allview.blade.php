<!DOCTYPE html>
<html lang="en">
<head>
  <title>View All Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

    
    @include('pages.layouts.nav');

    <div class="container">
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
                        <td><a href="{{ route('ContactInformation.singleView', $data->id) }}">View</a> </td>
                    </tr>
                        
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

        


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>