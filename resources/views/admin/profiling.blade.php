@extends('layouts.dashboard')

@section('content')

<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/profiling/go" method="POST"> 
               {{ csrf_field() }}
              <div class="box-body center">
                 <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="first_name" class="form-control validate" id="first_name" placeholder="First Name" name="first_name" >
                                            @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                </div>
                 <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="last_name" class="form-control validate" id="last_name" placeholder="Last Name" name="last_name">
                               @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->last('name') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                       @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                 
                    <div class="form-group">
                  <label >Select Unit</label>
                  <select class="form-control" name="unit">
                    <option>Technology</option>
                    <option>Coporate Affairs</option>
                    <option>Transaction Services</option>
                    <option>Treasury</option>
                    <option> Marketin</option>
                  </select>
                </div>

                 <!-- checkbox -->
                  <label>Select Tests</label>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input  value="1" type="checkbox" name="tests">
                      Mathematics
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input  value="2" type="checkbox" name="tests">
                      English
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input   value="3" type="checkbox" name="tests">
                      Quantitative
                    </label>
                  </div>
                </div>

                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection