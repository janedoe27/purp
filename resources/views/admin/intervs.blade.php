@extends('layouts.dashboard')

@section('new_resource')
<button class="btn btn-success" data-toggle="modal" data-target="#formModal">New Candidate</button>
<a href="{{ URL::to('app/downloadExcel/csv') }}"><button class="btn btn-default">Download CSV</button></a>
@endsection
@section('content')

<div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Interview Candidates. </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Questions Answered</th>
                  <th>Correct Answers</th>
                  <th>Score</th>
                  <th>Percentage Score</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{$user->first_name }}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->num_question_answered}} / {{$question->total_questions}}</td>
                    <td>{{$user->correct_answers}}</td>
                    <td>{{$user->total_score}} / {{$question->max_score}}</td>
                    <td>{{($user->total_score / $question->max_score) * 100}}</td>
                    <td>
                        <a href="{{url('app/questions/edit', $user->id)}}" class="btn" disabled><i class="fa text-success fa-pencil"></i></a> 
                        <a href="{{url('app/users', $user->id)}}" class="btn"><i class="text-info fa fa-eye"></i></a> 
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    {{$users->links()}}
                  </tr>
                </tfoot>
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