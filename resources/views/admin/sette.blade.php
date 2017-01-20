@extends('layouts.dashboard')

@section('content')
<!-- Main content -->
    <section class="content">


      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Marketing </a> just profiled </h3>

                <div class="timeline-body">
                 Maketing Team just profiled a new candidate.
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">Uche oba</a> just finished his test</h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-comments bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                <h3 class="timeline-header"><a href="#">Donatus Christal</a> was just Accepted</h3>

                <div class="timeline-body">
                 Donatus Christal was just taken for the Job
                </div>
              </div>
            </li>
            <!-- END timeline item -->
          
             <!-- =========================================================== -->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-default box-warning collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" name="unit">TECHNOLOGY</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <form role="form" method="POST" action="/sette/test">
                              {{ csrf_field() }}
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Question</label>
                  <input type="text" name="question" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Answer 1</label>
                  <input type="text" name="answer1" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Correct Answer</label>
                  <input type="text" name="correct" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Answer 3</label>
                  <input type="text" name="answer3" class="form-control" placeholder="Enter ...">
                </div>
            </div>

            <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Points</label>
                  <input type="text" name="point" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Unit</label>
                  <input type="text" name="unit" class="form-control" placeholder="Enter ...">
                </div>
            </div>

            <div class="timeline-footer">
                <button class="btn btn-block btn-success btn-sm" type="submit">Success</button>
                  <a class="btn btn-danger btn-xs">DELETE</a>
                </div>
                  </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      
        <!-- /.col -->


      <div class="row">
        <div class="col-md-12">
          <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">COPORATE AFFAIRS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                             <div class="form-group">
                  <label>Question</label>
                  <input type="text" name="question" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Answer 1</label>
                  <input type="text" name="answer1" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Answer 2</label>
                  <input type="text" name="answer2" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Answer 3</label>
                  <input type="text" name="answer3" class="form-control" placeholder="Enter ...">
                </div>
            </div>

            <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Points</label>
                  <input type="text" name="point" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Unit</label>
                  <input type="text" name="unit" class="form-control" placeholder="Enter ...">
                </div>
            </div>

            <div class="timeline-footer">
                <button class="btn btn-block btn-success btn-sm" type="submit">Success</button>
                  <a class="btn btn-danger btn-xs">DELETE</a>
                </div>
                  </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-default box-warning collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Marketing</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Question</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
            </div>

             <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Answer</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
            </div>
            <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">SUBMIT</a>
                  <a class="btn btn-danger btn-xs">DELETE</a>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
      

  @endsection