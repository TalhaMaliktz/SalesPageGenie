@extends('layouts.master')
@section('Title')
    Error
@endsection
@section('content')
<div class="jumbotronCus">
    <div class="container containerCus">
        <div class="panel panel-default">
            <div class="panel-body">
        <h2 style="width:100%" class="alert {{ Session::get('alert-class', 'alert-danger') }}">Sorry Something went wrong</h2>
            </div>
        </div>
    </div>
</div>
@endsection