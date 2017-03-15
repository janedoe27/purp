@extends('layouts.dashboard')

@section('content')

        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Current Interviews</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Progress</th>
                  <th style="width: 40px">Score</th>
                </tr>
                  @foreach ($Users->getCollection() as $User)
                <tr>
                  <td>{{$User -> id}} .</td>
                  <td>{{$User->first_name}}</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                @endforeach
                <tr>
                  
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               {{ $Users->links() }}
            </div>
          </div>
          <!-- /.box -->
          

@endsection