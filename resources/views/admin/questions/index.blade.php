@extends('layouts.dashboard')

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
                        <a href="{{url('admin/question/edit', $question->id)}}" class="btn"><i class="fa fa-pencil"></i></a> 
                        <a href="{{url('admin/question/delete', $question->id)}}" class="btn"><i class="text-danger fa fa-close"></i></a> 
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
  
  @endsection