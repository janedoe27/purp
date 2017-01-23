@extends('layouts.dashboard')

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
                  <th>Interv Name</th>
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
                <tfoot>
                <tr>
                 <th>Interv Name</th>
                  <th>Unit</th>
                  <th>Tests</th>
                  <th>Questions Answered</th>
                  <th>Score</th>
                </tr>
                </tfoot>
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