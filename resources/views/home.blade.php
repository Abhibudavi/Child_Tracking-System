@extends('layouts.app')

@section('content')



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script> -->
<style type="text/css">
  form .error {
  color: #ff0000;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Student Registration</div>

                <div class="panel-body">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
@if (Session::has('status'))
    <div class="alert alert-info">{{ Session::get('status') }}</div>
@endif
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post" name="register" action="/add_student" onsubmit="return validateForm()">
    {{csrf_field()}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-group ">
      <label class="control-label " for="name">
       SID
      </label>
      <input class="form-control" id="sid" name="sid" placeholder="SID" type="number" required=""  />
      <div id="error"></div>
     </div>
     <div class="form-group ">
      <label class="control-label " for="name">
       Name
      </label>
      <input class="form-control" id="name" name="name" placeholder="Name" type="text" required="" onchange="clear()" />
      <div id="errorn"></div>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="standard">
       Standard
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="standard" type="number" name="standard" placeholder="standard" type="text" required=""/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="division">
       Division
       <span class="asteriskField">
        *
       </span>
      </label>
     <!--  <input class="form-control" id="division" name="division" placeholder="division" type="text" required=""/> -->
     <select name="division" class="select form-control" required="">
       <option value="-1">Select Division</option>
       <option value="A">A</option>
       <option value="B">B</option>
       <option value="C">C</option>
       <option value="D">D</option>
       <option value="E">E</option>

     </select>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="roll_no">
       Roll No
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="roll_no" type="number" name="roll_no" placeholder="Roll No" type="text" required=""/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" type="number" for="mobile_no">
       Mobile No
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile No" type="number" required="" maxlength="10"/>
      <div id="error1"></div>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
<script type="text/javascript">
  function validateForm() {
   
    
    if (!/^[a-zA-Z]*$/g.test(document.register.name.value)) {
document.getElementById("errorn").innerHTML = "<font color='red'>Please Enter letters only!!</font>";
        document.register.name.focus();
        return false;
    }

    var x=document.getElementById("mobile_no").value;
    
    var len=x.toString().length;

    if(len!=10){
      document.getElementById("error1").innerHTML = "<font color='red'>Mobile number should be 10 digits!!</font>";
      return false;
    }
}

function clear() {
  alert('k');
    //var x = document.getElementById("mySelect").value;
    document.getElementById("error").innerHTML = " ";
}
</script>
@endsection
