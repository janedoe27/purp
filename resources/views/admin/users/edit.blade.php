@extends('layouts.dashboard')

@section('content')
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img profile img-responsive img-circle" data-name="{{$user->first_name}} {{$user->last_name}}" data-char-count="2" alt="User profile picture">

              <h3 class="profile-username text-center">{{$user->first_name}} {{$user->last_name}}</h3>
                @if ($user->is_admin)
                <p class="text-muted text-center">Site Administrator</p>
                @elseif ($user->is_staff)
                <p class="text-muted text-center">Staff Member</p>
                @else
                <p class="text-muted text-center">Candidate</p>
                @endif


              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>
      </section>
      

  @endsection
  @section('local_js')
  <script>
    $(function() {
       $('.profile').initial(); 
     });
  </script>
  @endsection