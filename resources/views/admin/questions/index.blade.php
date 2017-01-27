@extends('layouts.dashboard')

@section('new_resource')
<button class="btn btn-success" data-toggle="modal" data-target="#formModal">New Question</button>
<button class="btn btn-default" id="importTrigger">Import Questions</button>
<input type="file" accept="text/csv|" hidden name="questions" class="hidden" id="bulkQuestions">
@endsection
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">All Questions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th>Weight</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($questions as $question)
                  <tr>
                    <td>{{$question->name}}</td>
                    <td>{{$question->description}}</td>
                    <td class="pull-right">
                        <a href="{{url('app/questions/edit', $question->id)}}" class="btn"><i class="fa text-default fa-pencil"></i></a> 
                        <a href="{{url('app/questions/delete', $question->id)}}" class="btn"><i class="text-danger fa fa-close"></i></a> 
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
            <div class="modal-body">
              <form role="form" action="/app/categories/new" method="post">
                <div class="form-group">
                  <label>Category</label>
                  <select name="category" id="" class="form-control input-lg"></select>
                </div>
                <div class="form-group">
                  <label>Text</label>
                  <input type="text" name="description" class="form-control input-lg" placeholder="Enter ..." ">
                </div>
                <div class="form-group">
                  <label>Weight</label>
                  <input type="number" step="0.5" name="weight" class="form-control input-lg" placeholder="Select" ">
                </div>
                <hr class="divider">
                <label>Answers</label>
                <div class="form-group">
                    <div class="input-group answers">
                        <input type="text" name="answers[0][description]" class="form-control input-lg">
                        <span class="input-group-addon">
                          <input type="checkbox" class="isCorrect" name="answers[0][isCorrect]">
                          <label><small>Correct</small></label>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group answers">
                        <input type="text" name="answers[1][description]" class="form-control input-lg">
                        <span class="input-group-addon">
                          <input type="checkbox" class="isCorrect" name="answers[1][isCorrect]">
                          <label><small>Correct</small></label>
                        </span>
                    </div>
                </div>
                <div class="form-group pull-right">
                    <a href="">Add More</a> | <a class="text-danger" href="">Remove Newest</a> 
                </div>
                <br>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
          </div>
        </div>
      </div>
  @endsection
  @section('local_js')
  <script type="text/javascript">
    $(function() {
        $("#importTrigger").click(function() {
            $("#bulkQuestions").trigger('click');
        })
    })
  </script>
@endsection