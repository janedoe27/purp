@extends('layouts.base')

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">SIGN UP</h1>
      <div class="row center">
        <h5 class="header col s12 light">GTB ONLINE EXAM PLATFORM</h5>
      </div>

       <form class="col s12" action="{{ url('/register') }}" method="POST">
       {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" name="first_name">
          <label for="first_name">First Name</label>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="last_name">
          <label for="last_name">Last Name</label>
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="email">
          <label for="email"  data-error="wrong" data-success="right">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password_confirmation">
          <label for="password">Confirm Password</label>
        </div>
      </div>
      </div>

      <div class="form-group">

      <p class="center">
      <input value="1" type="checkbox"  id="is_admin" name="is_admin" />
      <label for="is_admin">Staff</label>
    </p>
  
                  <div class="checkbox center" >
                    <label>
                      <input  value="1" type="checkbox" name="is_admin">
                      Staff
                    </label>
                  </div>
            </div>

      <div class="row center">
      <button class="btn waves-effect waves- orange darken-4" type="submit">START
  </button>
      </div>
    </form>
      
      <br><br>
      <div class="row center">
        <h5>Please note that once you click the Login the Exams starts</h5>
      </div>
    </div>
  </div>

    <br><br>
  </div>
  @endsection