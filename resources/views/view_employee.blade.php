@extends('layout.mainlayout')
@section('content')
<script>
function editRow($id){  
    
    document.getElementById ( "emp_id" ).value = $id;
    document.getElementById ( "emp_name" ).value= document.getElementById ( $id+'_name' ).textContent;
    document.getElementById ( "emp_email" ).value= document.getElementById ( $id+'_email' ).textContent;
    document.getElementById ( "emp_nmbr" ).value= document.getElementById ( $id+'_con' ).textContent;
    document.getElementById ( "emp_des" ).value= document.getElementById ( $id+'_des' ).textContent;
    document.getElementById ( "emp_address" ).value= document.getElementById ( $id+'_add' ).textContent;
    document.getElementById ( "emp_reg" ).value= document.getElementById ( $id+'_reg' ).textContent;

     document.getElementById('id01').style.display='block';
}
function closeModel(){
    document.getElementById('id01').style.display='none';
}
$(document).ready(function() {
    $('#tbl_employees').DataTable( {
        "bPaginate": false,
        "pageLength": 10,
        "paging": false ,
        "info":     false,
        "searching": false,
        "order": [[0, 'asc']],
        "columnDefs": [
    { "orderable": false, "targets": [2,3,4,5] }
  ]
           } );

} );
function searchSection($nmbr,$search){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById($search);
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl_employees");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[$nmbr];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }}</script>
<div class="container" style="margin-top:2%">
    <div class="text-center">
    <h1 class="text-uppercase" style="color:black;">View Employees</h1><br>
    <div class="row">

<div class="active-cyan-3 active-cyan-6 col-md-6">
  <input class="form-control" type="text" name="emp_search" id="emp_search" placeholder="Search By Employee Name" onkeyup="searchSection(0 ,'emp_search')" aria-label="Search">
</div>
<div class="active-cyan-3 active-cyan-6 col-md-6">
  <input class="form-control" type="text" name="des_search" id="des_search" placeholder="Search By Employee Designation" onkeyup="searchSection(1 ,'des_search')" aria-label="Search">
</div>

</div>
<br/><br/>
              <table class="table table-striped table-bordered" cellspacing="0"  style="" id="tbl_employees" name="tbl_employees"  >
        <thead class="thead-light">

        <tr>
        <th>Employee Name</th>
        <th> Designation</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>


        </tr>
        </thead>
  
        <tbody class="tbody-dark">
        <?php
$x=0;
?>
    @foreach($employees as $emp)

<tr>
<td id="{{$emp->emp_id}}_name">{{$emp->emp_name}}</td>
<td id="{{$emp->emp_id}}_des">{{$emp->	emp_designation}}</td>
<td id="{{$emp->emp_id}}_con">{{$emp->emp_phone}}</td>
<td id="{{$emp->emp_id}}_email">{{$emp->emp_email}}</td>
<td id="{{$emp->emp_id}}_addd">{{$emp->emp_address}}</td>
<td > <button type="button" onclick="editRow(this.id);" name= "{{$emp->emp_id}}" id ="{{$emp->emp_id}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
</td>


</tr>

@endforeach
</tbody>
</div></div>
        </table>
        
<div id="pager">
      <ul id="pagination" class="pagination-sm"></ul>
</div>
 </div>
</div>


@endsection