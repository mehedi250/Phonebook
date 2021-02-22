<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Number</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

    @include('pages.layouts.nav');

<div class="container">
    <h3 class="m-4">Add Mobile Number</h3>
    <form action="{{ route('PhoneNumber.store', $id) }}" method="POST">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('Success'))
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('Success') }}
            </div>
        @endif


       @csrf
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number" id="phone">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    

</div>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>