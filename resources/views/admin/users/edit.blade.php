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


              <!--<ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>-->

              <a href="" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#formModal"><b>Edit</b></a>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>
      </section>
       <!-- Modal -->
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Update User</h4>
            </div>

            <!--<form role="form" action="/app/candidates" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="modal-body">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" required class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" required class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" required class="form-control" placeholder="Enter ..." required>
                </div>
                 
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>-->

            {!!Form::model($user,['url' => 'app/users/' . $user->id]) !!}

            <div class="form-group">
            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::text('is_admin', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::Submit('UPDATE', null, ['class'=>'btn btn-primary center']) !!}
            </div>


            {!! form::close() !!}
          </div>
        </div>
      </div>
      

  @endsection
  @section('local_js')
  <script>
    $(function() {
       $('.profile').initial(); 
     });
  </script>
  @endsection