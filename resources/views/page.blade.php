@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>

                    @if (Auth::user()->is_admin)
                        <p>
                            Go to <a href="{{ url('app/questions') }}">Dashboard</a>
                        </p>

                          <!--<p>
                            Analytics <a href="{{ url('dashboard/index') }}">View</a>
                        </p>-->
                    @else
                        <p>
                            Start <a href="{{ url('app/test') }}">tests
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection