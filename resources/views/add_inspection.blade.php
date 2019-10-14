@extends('layout.mainlayout')
@section('content')
<script type="text/javascript">
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var date_input2=$('input[name="ex_date"]'); 

      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        orientation:"top",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
      };
      date_input.datepicker(options);
      date_input2.datepicker(options);


      $('#company').change(function(){
        var id = $(this).val();

$.ajax({
     url: 'getEmployees/'+id,
     type: 'get',
     dataType: 'json',
     success: function(response){
      var emp_id = response['data'][0].emp_id;
      var emp_name = response['data'][0].emp_name;
      var ins_date = response['data'][0].ins_date;
var lastVisit = " Last visited employee for this company was ";
var datevisited= " on ";
var res = lastVisit.concat(emp_name, datevisited,ins_date);

      $('div.emperr').text(res);

     } ,
     error:function(){
     }
  });



      });

    });

</script>
<div class="container" >
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="text-center">
    <h2 class="text-uppercase" style="color:black;">Add Inspection</h2><br/>

    <form class="form-horizontal"  method="post" action="/addInspection">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group" style="text-align:right">
    <div class="col-sm-2">
    <label for="emp" style="text-align: left" class="control-label">Employee Name</label>
    </div>
    <div class="col-sm-4">
    
    <select class="form-control dynamic" data-dependent="emp" id="emp" name='emp'>
            <option selected>Employee </option>
              @foreach($emp as $section)
            <option value="{{ $section['emp_id'] }}">{{ $section['emp_name'] }}</option>
              @endforeach

          </select>
</div>
<div class="col-sm-2">
<label for="com" style="text-align: right" class="control-label">Company Name</label>
</div>
<div class="col-sm-4">
    <select class="form-control dynamic" data-dependent="company" id="company" name='company'>
            <option selected>Company </option>
            @foreach($company as $company)
            <option value="{{ $company->company_id }}">{{ $company->company_name }}</option>
              @endforeach

          </select>
          <div class="emperr">   </div>
    </div>
</div>
<div class="form-group" style="text-align:right"> <!-- Date input -->
<div class="col-sm-2">
<label for="ins_date" style="text-align: left"   class="control-label">Inspection Date</label>
</div>
<div class="col-sm-4">
        <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
      </div>      
      <div class="col-sm-2">
<label for="ex_date" style="text-align: left" class="control-label">Export Date</label>
</div>
<div class="col-sm-4">
        <input class="form-control" id="ex_date" name="ex_date" placeholder="YYYY/MM/DD" type="text"/>
      </div>   
      
      </div>

<div class="form-group" style="text-align:right">

<div class="col-sm-2">
<label for="remark" style="text-align: left"   class="control-label">Remark</label>
</div>
<div class="col-sm-4">
        <input class="form-control" id="note" name="note" placeholder="remarks" type="text"/>
      </div>      
      <div class="col-sm-2">
<label for="como" style="text-align:left" class="control-label">Commodity</label>
</div>
<div class="col-sm-4">
        <input class="form-control" id="commodity" name="commodity" placeholder="commodity" type="text"/>
      </div>   
      

</div>

<div class="form-group" style="text-align:right">
<div class="col-sm-4"></div>
<div class="col-sm-4"></div>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary btn-lg">Add</button></div>

</div>




</form>
    
 </div>
</div>
@endsection