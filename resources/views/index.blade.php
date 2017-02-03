@extends('layouts.base')

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">GTBEX</h1>
      <div class="row center">
        <h5 class="header col s12 light">GTB ONLINE EXAM PLATFORM</h5>
      </div>
      @if (Auth::guest())
      <div class="row center">
        <a href="/login" id="download-button" class="btn-large waves-effect waves-orange darken-4">Get Started</a>
      </div>
      @else
      <div class="row center">
        <a href="/app/test" id="download-button" class="btn-large waves-effect waves- orange darken-4">Take Test</a>
      </div>
      @endif
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-dark-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Speeds up Marking</h5>

            <p class="light">Get Marked in No time, unlike paper tests.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-dark-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">Using this, it is assumed that users are more focused and get more work done.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center orange-dark-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">We have provided a better way to test prospective and intending staffs.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>

  </div>
  
@endsection