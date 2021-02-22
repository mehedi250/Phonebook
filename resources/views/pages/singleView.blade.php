<!DOCTYPE html>
<html lang="en">
<head>
  <title>Single View Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
    <a class="navbar-brand" href="#">Phone Book</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/mehedi250/Laravel_Phonebook" target="_blank">Github</a>
            </li>
        </ul>   
    </div>
</div>



    <div class="container">

        <h3 class="text-center">Record</h3>  
            <div class="border ">
                <div class="row m-1 bg-secondary">
                    <div class="col-8"><h4 class="text-light">Basic Info</h4></div>
                    <div class="col-4 text-right"><a class="text-light" href="">Edit</a></h4></div>
                </div>

                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><p>Name : <p><p>{{ $data->name }}</p></li>
                        <li class="list-group-item"><p>Address : <p><p>{{ $data->address }}</p></li>
                    </ul>
                </div>
            </div>

            <div class="border ">
                <div class="row m-1 bg-secondary">
                    <div class="col-8"><h4 class="text-light">Phone Number</h4></div>
                    <div class="col-4 text-right"><a class="text-light" href="">Edit</a></h4></div>
                </div>

                <div>
                    <ul class="list-group list-group-flush">
                    @foreach ($data->getphones as $phone)
                        <li class="list-group-item"><p>{{ $phone->phone_number }}</p></li>
                    @endforeach
                    </ul>
                </div>
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>