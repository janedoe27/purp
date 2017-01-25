@extends('layouts.dashboard')
@section('new_resource')
<button class="btn btn-success" data-toggle="modal" data-target="#formModal">New Category</button>
@endsection
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">All Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 
                <tr>
                  <th>Category Name</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td class="pull-right">
                        <a href="{{url('admin/category/edit', $category->id)}}" class="btn"><i class="fa fa-pencil"></i></a> 
                        <a href="{{url('admin/category/delete', $category->id)}}" class="btn"><i class="text-danger fa fa-close"></i></a> 
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
              <h4 class="modal-title" id="myModalLabel">New Category</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="/app/categories/new" method="post">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter ..." ">
                </div>
                  <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
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