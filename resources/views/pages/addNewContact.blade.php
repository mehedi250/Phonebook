<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="my-4"><input style="width:60%; display:inline;float:left;" type="text" class="form-control" placeholder="Enter Phone Number"  name="phone_number[]" value=""/><a href="javascript:void(0);" class="remove_button"><img style="height:30px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Ambox_emblem_minus.svg/1200px-Ambox_emblem_minus.svg.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
  
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





    <div class="container ">
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
   
        <div class="m-4 border bg-info">
            <form  class="m-4" action="{{ route('save_new_Contact') }}" method="POST">
            <h3 class="m-4 p-4">Add Contact</h3>
            @csrf

            
               
                
                <div class="form-group">
                    <label for="name">Contact Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Contact Name" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address">
                </div>

                

                <div class="field_wrapper form-group">
                <p>Phone Number :</p>
                    <div" class="my-3">
                        <input style="width:60%; display:inline;float:left;" type="text" class="form-control"  name="phone_number[]"  placeholder="Enter Phone Number" value=""/>
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img style="height:28px;" src="https://pngimg.com/uploads/plus/plus_PNG102.png"/></a>
                    </div>
                </div>

                

                <div class="text-center form-group" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

        
                
            </form>
        </div>
    
    
    
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>