@extends('layouts.base')

@include('errors.list')
@section('content')
 <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
       @foreach ($questtests->getCollection() as $questtest)
      <h1 class="header center orange-text">QUESTION {{$questtest -> id}} </h1>
      <div class="row center" id="app">
      
        <h3 class="header col s12 light">
          
          {{$questtest -> question}}
          
          </h3>
   
      </div>
      
      <br><br>
        <div class="row center">
          <form action="#">
    <p>
      <input name="answer1" type="radio" id="test1" />
      <label for="test1"> {{$questtest-> answer1}}</label>
    </p>
    <p>
      <input name="group1" type="radio" id="test2" />
      <label for="test2">{{$questtest-> correct}}</label>
    </p>
    <p>
      <input  name="group1" type="radio" id="test3"  />
      <label for="test3">{{$questtest-> answer3}}</label>
    </p>
  </form>
   @endforeach
     </div>
     
      <div class="row center">
        <ul class="pagination">
        {{ $questtests->links()}}
        
          <a class="waves-effect waves- orange darken-4 btn" href="">NEXT</a>
      </u/>
    </div>
  </div>
     

  @endsection