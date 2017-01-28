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
                  <th>Answers</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($questions as $question)
                  <tr>
                    <td>{{$question->weight}}</td>
                    <td>{{$question->description}}</td>
                    <td>
                    <ol>
                      @foreach ($question->answers as $answer)
                      <li>{{$answer->description}} @if ($answer->isCorrect) <i class="pull-right fa text-success fa-check"></i> </li>
                      @endif
                      @endforeach
                    </ol>
                    </td>
                    <td>
                        <a href="{{url('app/questions/edit', $question->id)}}" class="btn" disabled><i class="fa text-default fa-pencil"></i></a> 
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
            <form role="form" id="questionForm" action="/app/questions/new" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="modal-body">
                <div class="form-group">
                  <label>Category</label>
                  <select name="category" id="" class="form-control input-lg" required>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Text</label>
                  <input type="text" name="description" class="form-control input-lg" placeholder="Enter ..."  required>
                </div>
                <div class="form-group">
                  <label>Weight</label>
                  <input type="number" step="0.5" name="weight" class="form-control input-lg" placeholder="Select"  required>
                </div>
                <hr class="divider">
                <label>Answers</label>
                <div class="answer-group">
                  <div class="form-group">
                      <div class="input-group answers">
                          <input type="text" name="answers[0][description]" class="form-control input-lg" required>
                          <span class="input-group-addon">
                            <input type="checkbox" class="isCorrect" name="answers[0][isCorrect]" value="false">
                            <label><small>Correct</small></label>
                          </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group answers">
                          <input type="text" name="answers[1][description]" class="form-control input-lg" required>
                          <span class="input-group-addon">
                            <input type="checkbox" class="isCorrect" name="answers[1][isCorrect]" value="false">
                            <label><small>Correct</small></label>
                          </span>
                      </div>
                  </div>
                </div>
                <div class="form-group pull-right">
                    <a href id="addOne">Add More</a> <span class="removeOne hidden">|</span> <a class="text-danger hidden removeOne" href="" id="removeOne">Remove Newest</a> 
                </div>
                <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
          </div>
          </form>
        </div>
      </div>
  @endsection
  @section('local_js')
  <script type="text/javascript">

    $(function() {
        let parent = $('.answer-group');

        parent.on('change', function(e) {

          if (parent.children().length > 2) {
            $('.removeOne').removeClass('hidden')
          } else {
            $('.removeOne').addClass('hidden');
          }
        })

        $("#importTrigger").click(function() {
            $("#bulkQuestions").trigger('click');
        });

        $("#addOne").click(function(e) {

          e.preventDefault();
          let last = parent.children().last();

          let child = last.clone();

          let index = last.index() + 1;

          child.find("input[type=text]").attr("name", "answers[" + index + "][description]")
          child.find("input[type=checkbox]").attr("name", "answers[" + index + "][isCorrect]")

          parent.append("<div class='form-group'>" + child.html() + "</div>");
          parent.trigger('change');
          return false;
        })

        $("#removeOne").click(function(e) {
          e.preventDefault();
          let parent = $('.answer-group');
          if (parent.length < 2) {
            parent.children().last().remove();
          } 
          parent.trigger('change');
          return false;
        })

        $(":checkbox").change(function() {
         
          let $this = $(this);
          $this.val($this.prop('checked'));

          parent.find(":checkbox:not(:checked)").not($this).attr("disabled", this.checked);

        });

        $("#questionForm").submit(function(e) {
          console.log($(this).serialize())
          let checkedBox = $(this).find('.isCorrect:checked');

          if(!checkedBox.length) {
            alert('You must designate one of the answers as the correct answer!')
            e.preventDefault()
            return false
          }
        })

    })
  </script>
@endsection