<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="  https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="  https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <img src= "{{{url('/images/logo.jpg')}}}"  width="200" height="50" alt="">

      </div>
    <ul class="nav navbar-nav">
      <li class="{{{ Route::currentRouteName() == 'home' ? 'active' : '' }}}"><a href="{{url('/home')}}">Home</a></li>
      <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Inspection <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="{{url('/add_inspection')}}">Add Inspection</a></li>
          <li><a href="{{url('/view_inspection')}}">View Inspection</a></li>
        </ul>
      </li>
      <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Employees <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="{{url('/add_employee')}}">Add Employees</a></li>
          <li><a href="{{url('/view_employee')}}">View Employees</a></li>
        </ul>
      </li>
      <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Companies <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li ><a href="{{url('/add_company')}}">Add Companies</a></li>
          <li><a href="{{url('/view_company')}}">View Companies</a></li>
        </ul>
      </li>
  <!--    <li class="{{{ Route::currentRouteName() == 'add_employee' ? 'active' : '' }}}"><a href="{{url('/add_employee')}}" >Add Employee</a></li>
      <li class="{{{ Route::currentRouteName() == 'add_company' ? 'active' : '' }}}"><a href="{{url('/add_company')}}" >Add Company</a></li> -->
    </ul>
  </div>
</nav>
  
<div class="container">
@yield('content')

</div>

</body>
@include('layout.partials.footer')
</html>