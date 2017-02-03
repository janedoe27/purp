@extends('layouts.base')

@include('errors.list')
@section('content')
 <div class="section no-pad-bot" id="index-banner">
    <div class="container ">
      <br><br>
      <div class="row center" id="app">
      
        <h3 class="header col s12 light">
          
          {{$question -> description}}
          
          </h3>
   
      </div>
      
        <div class="row center">
          <form action="/app/sessions"  id="submit" method="post">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="question" value="{{$question->id}}" required>
            @foreach ($question->answers as $answer)
            <p>
              <input  type="radio" name="answer" class="form-control input-lg answer" value="{{$answer->id}}"  id="{{$answer->id}}" required />
              <label for="{{$answer->id}}"> {{$answer-> description}}</label>
            </p>
            @endforeach
            <button type="submit" class="btn btn-flat" style="border-width: 3px; border-color: #333">Submit</button>
          </form>
        </div>
     </div>
  </div>
  @endsection
  @section('local_js')
  <script type="text/javascript">
    $(function(){
      $('.disabled').addClass('hidden').hide();

      try {
          var $_console$$ = console;
          Object.defineProperty(window, "console", {
              get: function() {
                  if ($_console$$._commandLineAPI)
                      throw "Sorry, for security reasons, the script console is deactivated on netflix.com";
                  return $_console$$
              },
              set: function($val$$) {
                  $_console$$ = $val$$
              }
          })
      } catch ($ignore$$) {
        console.log($ignore$$)
      }

    });
  </script>
  @endsection