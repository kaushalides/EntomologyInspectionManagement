
@extends('layout.mainlayout')
@section('content')

<div class="container" >
    <div class="text-center">
    <h1 class="text-uppercase" style="color:black;">Add Employee</h1></div>

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action= "{{url('/addNewEmployee')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
    
    <label for="FormControlname" style="text-align: left" class="control-label col-sm-2">Employee Name</label>
    <div class="col-sm-10">
    <input type="text"  required class="form-control" name="emp_name" id="emp_name" placeholder="Employee name">
  </div></div>
  <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" required class="form-control" name="emp_email" id="emp_email" placeholder="Enter email" >
      </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="text-align: left" for="FormControlphone">Contact Number</label>
    <div class="col-sm-10">
    <input type="number" required class="form-control" name="emp_contact" id="emp_contact" placeholder="Contact number">
</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="text-align: left" for="FormControlfax">Designation</label>
    <div class="col-sm-10">
    <input type="text" required class="form-control" name="emp_des" id="emp_des" placeholder="Designation">
</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="text-align: left" for="address">Employee Address</label>
    <div class="col-sm-10">
<textarea class="form-control  col-sm-8" required placeholder="Address" name="emp_address" id="emp_address"></textarea>
  </div></div>
 
  </div>
  
  <div class="col-sm-6"></div>
  <div class="col-sm-6">

  <button type="submit" class="btn btn-primary btn-md">Add</button></div>
</form>
 </div>
@endsection