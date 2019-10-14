
@extends('layout.mainlayout')
@section('content')
<script>
function searchSection($nmbr,$search){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById($search);
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl_task");
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
    <h1 class="text-uppercase" style="color:black;">View Inspections</h1>
    <div class="row">
<div class="active-cyan-3 active-cyan-6 col-md-6">
  <input class="form-control" type="text" name="emp_search" id="emp_search" onkeyup="searchSection(1 ,'emp_search')" placeholder="Search By Employee" aria-label="Search">
</div>
<div class="active-cyan-3 active-cyan-6 col-md-6">
  <input class="form-control" type="text" name="com_search" id="com_search" placeholder="Search By Company" onkeyup="searchSection(0 ,'com_search')" aria-label="Search">
</div>


</div>
<br/><br/>
              <table class="table table-striped table-bordered" cellspacing="0"  style="" id="tbl_task" name="tbl_task"  >
        <thead class="thead-light">

        <tr>
        <th>Company</th>
        <th>Employee</th>
        <th>Inspection Date</th>
        <th>Export Date</th>
        <th>Remarks</th>
        <th>Commodity</th>
        

        </tr>
        </thead>
  
        <tbody class="tbody-dark">
        <?php
$x=0;
?>
    @foreach($inspection as $inspection)

<tr>
<td >{{$inspection->company_name}}</td>
<td>{{$inspection->emp_name}}</td>
<td>{{$inspection->ins_date}}</td>
<td>{{$inspection->export_date}}</td>
<td>{{$inspection->	inspection_note}}</td>
<td>{{$inspection->commodity}}</td>


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