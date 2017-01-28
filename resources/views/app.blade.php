@extends('layouts.base')

@include('errors.list')
@section('content')
 <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
       @foreach ($questions->getCollection() as $question)
      <h1 class="header center orange-text">QUESTION {{$question -> id}} </h1>
      <div class="row center" id="app">
      
        <h3 class="header col s12 light">
          
          {{$question -> description}}
          
          </h3>
   
      </div>
      
        <div class="row center">
          <form action="#">
            @foreach ($question->answers as $answer)
            <p>
              <input name="answer" data-cbt-value="{{$answer->id}}" type="radio" id="test" />
              <label for="test"> {{$answer-> description}}</label>
            </p>
            @endforeach
            <button type="submit" class="btn btn-success">Save</button>
          </form>
        </div>
      @endforeach
     </div>
        <div class="row center">
          {{$questions->links()}}
        </div>
  </div>
  @endsection
  @section('local_js')
  <script type="text/javascript">
    $(function(){
      $('.disabled').addClass('hidden').hide();
    })
  </script>
  @endsection