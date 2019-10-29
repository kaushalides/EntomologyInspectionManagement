@extends('layout.mainlayout')
@section('content')
<script>
function editRow($id){  
    
    document.getElementById ( "company_id" ).value = $id;
    document.getElementById ( "com_name" ).value= document.getElementById ( $id+'_name' ).textContent;
    document.getElementById ( "com_email" ).value= document.getElementById ( $id+'_email' ).textContent;
    document.getElementById ( "com_nmbr" ).value= document.getElementById ( $id+'_con' ).textContent;
    document.getElementById ( "com_fax" ).value= document.getElementById ( $id+'_fax' ).textContent;
    document.getElementById ( "com_address" ).value= document.getElementById ( $id+'_add' ).textContent;
    document.getElementById ( "com_reg" ).value= document.getElementById ( $id+'_reg' ).textContent;

     document.getElementById('id01').style.display='block';
}
function closeModel(){
    document.getElementById('id01').style.display='none';
}
$(document).ready(function() {
    $('#tbl_companies').DataTable( {
        "bPaginate": false,
        "pageLength": 10,
        "paging": false ,
        "info":     false,
        "searching": false,
        "order": [[0, 'asc']],
        "columnDefs": [
    { "orderable": false, "targets": [1,2,3,4,6] }
  ]
           } );

} );
function searchSection($nmbr,$search){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById($search);
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl_companies");
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
    <h1 class="text-uppercase" style="color:black;">View Companies</h1><br>
    <div class="row">

<div class="active-cyan-3 active-cyan-6 col-md-6">
  <input class="form-control" type="text" name="com_search" id="com_search" placeholder="Search By Company" onkeyup="searchSection(0 ,'com_search')" aria-label="Search">
</div>
<div class="active-cyan-3 active-cyan-6 col-md-6">
  <input class="form-control" type="text" name="reg_search" id="reg_search" placeholder="Search By Registration Number" onkeyup="searchSection(5 ,'reg_search')" aria-label="Search">
</div>

</div>
<br/><br/>
              <table class="table table-striped table-bordered" cellspacing="0"  style="" id="tbl_companies" name="tbl_companies"  >
        <thead class="thead-light">

        <tr>
        <th>Company Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Fax</th>
        <th>Address</th>
        <th>Registration Number</th>
        <th>Action</th>


        </tr>
        </thead>
  
        <tbody class="tbody-dark">
        <?php
$x=0;
?>
    @foreach($companies as $company)

<tr>
<td id="{{$company->company_id}}_name">{{$company->company_name}}</td>
<td id="{{$company->company_id}}_add">{{$company->	company_address}}</td>
<td id="{{$company->company_id}}_con">{{$company->company_contact}}</td>
<td id="{{$company->company_id}}_fax">{{$company->company_fax}}</td>
<td id="{{$company->company_id}}_email">{{$company->	company_email}}</td>
<td id="{{$company->company_id}}_reg">{{$company->company_reg_no}}</td>
<td > <button type="button" onclick="editRow(this.id);" name= "{{$company->company_id}}" id ="{{$company->company_id}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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

<!-- The Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" method="post" action="{{url('/editCompany')}}">
      <input type="hidden" name="company_id" id="company_id">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="w3-section">
          <label><b>Company Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Company Name" name="com_name" id="com_name" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border" type="email" placeholder="Company Email" name="com_email" id="com_email" required>
          <label><b>Contact Number</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="number" placeholder="Contact Number" name="com_nmbr" id="com_nmbr" required>
          <label><b>Fax</b></label>
          <input class="w3-input w3-border" type="number" placeholder="Fax" name="com_fax" id="com_fax" required>
          <label><b>Address</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Address" name="com_address" id="com_address" required>
          <label><b>Registration Number</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Registration Number" name="com_reg" id="com_reg" required>
          

          <div class="w3-section">
          <input type="submit" class="w3-btn w3-green" value="Save">
  <input type="button" class="w3-btn w3-red" onclick="closeModel()" value="Close">
         
        </div>        </div>

      </form>

      

    </div>
  </div>


@endsection