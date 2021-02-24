@extends('pages.master.master')

@section('title')
Add New Contact
@endsection


@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

                @if(session()->has('Success'))
                    <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session()->get('Success') }}
                    </div>
                @endif
   
        <div class="m-4 border ">
            <form  class="m-4" action="{{ route('PhoneNumber.store',$data) }}" method="POST">
            <h3 class="m-1 p-4"><i class="fas fa-address-book"></i> Add New Number</h3>
            @csrf
                
                <div class="field_wrapper form-group">
                <p>Phone Number :</p>
                    <div" class="my-3">
                        <input style="width:60%; display:inline;float:left;" type="text" class="form-control"  name="phone_number[]"   placeholder="Enter Phone Number" value=""/>
                        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus-circle fa-2x text-success"></i></a>
                    </div>
                </div>

                <div class="text-center form-group" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="my-4"><input style="width:60%; display:inline;float:left;" type="text" class="form-control" placeholder="Enter Phone Number"  name="phone_number[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus-circle fa-2x text-danger"></i></a></div>'; //New input field html 
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
@endsection