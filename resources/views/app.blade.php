@extends('layouts.base')

@include('errors.list')
@section('content')
 <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
       @foreach ($questions->getCollection() as $question)
      <div class="row center" id="app">
      
        <h3 class="header col s12 light">
          
          {{$question -> description}}
          
          </h3>
   
      </div>
      
        <div class="row center">
          <form action=""  id="submit" method="post">
            <input type="hidden" name="question" value="{{$question->id}}">
            @foreach ($question->answers as $answer)
            <p>
              <input  type="radio" name="answer" class="form-control input-lg" value="{{$answer->id}}"  id="{{$answer->id}}" />
              <label for="{{$answer->id}}"> {{$answer-> description}}</label>
            </p>
            @endforeach
            <button type="submit" class="btn btn-default">Save</button>
          </form>
        </div>
      @endforeach
     </div>
        <div class="row center hide">
          {{$questions->links()}}
        </div>
  </div>
  @endsection
  @section('local_js')
  <script type="text/javascript">
    $(function(){
      $('.disabled').addClass('hidden').hide();

      (function() {
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
        }
      })();
      $("#submit").on('submit',  function(event) {
        console.log($(this));

        event.preventDefault();
        return false;
      })
    });
  </script>
  @endsection