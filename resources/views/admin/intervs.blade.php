@extends('layouts.dashboard')

@section('new_resource')
<button class="btn btn-success" data-toggle="modal" data-target="#formModal">New Candidate</button>
<button class="btn hidden btn-default" id="importTrigger">Import Candidates</button>
<input type="file" accept="text/csv|" hidden name="questions" class="hidden" id="bulkQuestions">
@endsection
@section('content')

<div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Interviewees.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th>Candidate's Name</th>
                  <th>Questions Answered</th>
                  <th>Correct Answers</th>
                  <th>Completion Rate</th>
                  <th>Score</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                <tr>
                  <td>{{$user->first_name }}</td>
                  <td>{{$user->answer_id}}</td>
                  <td>Mathematics, English</td>
                  <td> 6</td>
                  <td>{{$user->score }}</td>
                </tr>
                                </tbody>
                  @endforeach
              </table>
            </div>
            <div class="box-footer center">
            </div>  
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
              <h4 class="modal-title" id="myModalLabel">New Category</h4>
            </div>
            <form role="form" action="/app/candidates" method="post">
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
            </form>
          </div>
        </div>
      </div>
  @endsection
  @section('local_js')
  <script type="text/javascript">
    $(document).ready(function() {
    })
  </script>
  @endsection