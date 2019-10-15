
@extends('layout.mainlayout')
@section('content')

<div class="container" >
    <div class="text-center">
    <h1 class="text-uppercase" style="color:black;">Add Company</h1></div>

    <form class="form-horizontal" method="post" action="{{url('/addNewCompany')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
    
    <label for="FormControlname" style="text-align: left" class="control-label col-sm-2">Company Name</label>
    <div class="col-sm-10">
    <input type="text"  required class="form-control" name="company_name" id="company_name" placeholder="company name">
  </div></div>
  <div class="form-group">
      <label class="control-label col-sm-2" style="text-align: left" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" required class="form-control" name="company_email" id="company_email" placeholder="Enter email" name="email">
      </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="text-align: left" for="FormControlphone">Contact Number</label>
    <div class="col-sm-10">
    <input type="number" required class="form-control" name="company_contact" id="company_contact" placeholder="company contact number">
</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="text-align: left" for="FormControlfax">Company Fax</label>
    <div class="col-sm-10">
    <input type="number" required class="form-control" name="company_fax" id="company_fax" placeholder="company fax number">
</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="text-align: left" for="address">Company Address</label>
    <div class="col-sm-10">
<textarea class="form-control  col-sm-8" required placeholder="Address" name="company_address" id="company_address"></textarea>
  </div></div>
  <div class="form-group">
    <label class="control-label col-sm-2" style="text-align: left" for="reg">Company Registration Number</label>
    <div class="col-sm-10">
    <input type="number" required class="form-control col-sm-8" id="company_reg_no" name="company_reg_no" placeholder="company registration number">
</div>
  </div>
  <div class="col-sm-6"></div>
  <div class="col-sm-6">

  <button type="submit" class="btn btn-primary btn-md">Add</button></div>
</form>
 </div>
@endsection