@extends('layouts.dashboard')

@section('new_resource')
<button class="btn btn-success" data-toggle="modal" data-target="#formModal">New User</button>
<button action="{{ URL::to('importExcel') }}"  method="post" enctype="multipart/form-data" class="btn hidden btn-default" id="importTrigger">Import Users</button>
<input type="file" accept="text/csv|" hidden name="import_file" class="hidden" id="bulkQuestions">
@endsection
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">All Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Is Admin</th>
                  <th>Is Staff</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td><script>document.write(Boolean({{$user->is_admin}}))</script></td>
                    <td><script>document.write(Boolean({{$user->is_staff}}))</script></td>
                    <td>
                        <a href="{{url('app/users', $user->id)}}" class="btn" title="View User"><i class="fa text-success fa-eye"></i></a>
                        @if(Auth::user()->is_admin)
                        <a href="{{url('app/users/edit', $user->id)}}" class="btn" title="Edit User"><i class="fa text-default fa-pencil"></i></a> 
                        @endif
                        @if(Auth::user()->id != $user->id)
                        <a href="{{url('app/users/delete', $user->id)}}" class="btn" title="Delete User"><i class="text-danger fa fa-close"></i></a> 
                        @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     {{-- {{ $Users->links() }} --}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
      <!-- Modal -->
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add New Question</h4>
            </div>
            <form role="form" id="userForm" action="/app/users/new" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal-body">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control input-lg" placeholder="Enter ..."  required>
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control input-lg" placeholder="Enter ..."  required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control input-lg" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                  <label><input type="checkbox" name="is_admin" class="checkbox" > Is Admin</label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                  <label><input type="checkbox" name="is_staff" class="checkbox" > Is Staff</label>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-lg">Create</button>
            </div>
          </div>
          </form>
        </div>
      </div>
  @endsection
  @section('local_js')
  <script type="text/javascript">

    $(function() {

        $(":checkbox").change(function() {
         
          let $this = $(this);
          $this.val(Number($this.prop('checked')));

        });

    })
  </script>
@endsection