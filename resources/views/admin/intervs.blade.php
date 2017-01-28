@extends('layouts.dashboard')

@section('new_resource')
<button class="btn btn-success" data-toggle="modal" data-target="#formModal">New Candidate</button>
<button class="btn btn-default" id="importTrigger">Import Candidates</button>
<input type="file" accept="text/csv|" hidden name="questions" class="hidden" id="bulkQuestions">
@endsection
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th>Candidate's Name</th>
                  <th>Unit</th>
                  <th>Tests</th>
                  <th>Questions Answered</th>
                  <th>Score</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($intervs->getCollection() as $interv)
                <tr>
                  <td>{{$Interv->first_name}}</td>
                  <td>Technology</td>
                  <td>Mathematics, English</td>
                  <td> 6</td>
                  <td>32%</td>
                </tr>
                                </tbody>
                  @endforeach
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
              <h4 class="modal-title" id="myModalLabel">New Category</h4>
            </div>
            <form role="form" action="/app/categories/new" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" required class="form-control" placeholder="Enter ..." ">
                </div>
                  <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" required class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
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