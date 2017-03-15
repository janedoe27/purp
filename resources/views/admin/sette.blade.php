@extends('layouts.dash2')

@section('content')
<!-- Main content -->
    <section class="content">
      <div class="content body">

<section id="introduction">
  <h2 class="page-header"><a href="#introduction">Introduction</a></h2>
  <p class="lead">
    <b>PURP CBT system</b> is a Java Desktop Application designed by the integration of Java and MySQL 
    to help provide a flexible platforms where-by Computer Based Tests can be organized and performed. 
    The System is divided into two parts;
    <ul>
    <li>1. Test Section.</li>
    <li>2. Dashboard</li>
    </ul>
   NOTE: DEFAULT PASSWORD IS CBT1234@@
  </p>

  <p> To import users/candidates the excel sheet MUST be in CSV format and should have the following columns</p>

  <table class="table">
<thead>
                 
                <tr>

                 <th>id</th>
                 <th>First_name</th>
                 <th>Last_name</th>
                  <th>Email</th>
                  <th>Is_Admin</th>
                  <th>Is _Staff</th>
                  <th>password</th>

 </tr>

                </thead>
                 
               
  </table>
</section><!-- /#introduction -->
</section>


      

  @endsection