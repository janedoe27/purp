@extends('layouts.dashboard')


@section('content')


<form action="PostImport" method="post" enctype="multipary/form-data">
<input type="hidden" name="token" value="{{csrf_token()}}">
<input type="file" name="intervs">
<input type="submit" value="import"></input>
</form>


@endsection