@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-8">
                <div class = "card">
                    <div class = "card-header">
                        Add Client
                        <div class = "float-right"><a href = "/"><b>View Users</b></a></div>
                    </div>
                    <div class = "card-body">
                        <form method = "post" action = "{{route('clients.store')}}" enctype = "multipart/form-data">
                            @csrf
                            @if(session('msg'))
                                <p class = "alert alert-success">{{session('msg')}}</p>
                            @endif
                            <div class = "row">
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputName">Name</label>
                                    <input name = "post[name]" required type = "text" class = "form-control" id = "exampleInputName" placeholder = "Enter name">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputEmail1">Email address</label>
                                    <input name = "post[email]" required type = "email" class = "form-control" id = "exampleInputEmail1" placeholder = "Enter email">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputPhone">Phone</label>
                                    <input name = "post[phone]" required type = "number" class = "form-control phone" id = "exampleInputPhone" placeholder = "Enter phone">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputAddress">Address</label>
                                    <input name = "post[address]" required type = "text" class = "form-control" id = "exampleInputAddress" placeholder = "Enter Address">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputNationality">Nationality</label>
                                    <input name = "post[nationality]" required type = "text" class = "form-control" id = "exampleInputNationality" placeholder = "Enter Nationality">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputPhone">Gender</label>
                                    <select name = "post[gender]" required class = "form-control" id = "">
                                        <option value = "male">Male</option>
                                        <option value = "female">Female</option>
                                    </select>
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputEducationBackground">Education background</label>
                                    <input name = "post[education]" required type = "text" class = "form-control" id = "exampleInputEducationBackground" placeholder = "Enter Education background">
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputNationality">Preferred mode of contact</label>
                                    <select name = "post[contact]" class = "form-control">
                                        <option value = "email">Email</option>
                                        <option value = "phone">phone</option>
                                        <option value = "none">None</option>
                                    </select>
                                </div>
                                <div class = "form-group col-md-6">
                                    <label for = "exampleInputDob">Date of birth</label>
                                    <input name = "post[dob]" required type = "date" class = "form-control" id = "exampleInputDob" placeholder = "Enter Date of Birth">
                                </div>
                            </div>
                            <button type = "submit" class = "btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       $(document).ready(function(){

          $(".phone").on("blur", function(){
             var mobNum = $(this).val();
             console.log(mobNum);

             var filter = /^\d*(?:\.\d{1,2})?$/;


          });

       });
    </script>
@endsection