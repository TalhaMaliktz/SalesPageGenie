@extends('layouts.master')
@section('Title')
    Saved Links
@endsection
@section('content')
    <div class="jumbotronCus">
        <div class="container containerCus">
            <div class="panel panel-default">
                <div class="panel-body">
                     <h2>Hello,  {{ Auth::user()->name }}</h2>
                     <p>Following are the links you saved in Sales Page Genie</p>
                        {{-- <div class="container"> --}}
                        @if(Session::has('message'))
                        <p style="width:100%" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                            <table class="table-responsive css-serial table">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th style="padding:0 15px 0 15px;" ><strong>URL</strong></th>
                                        <th style="padding:0 15px 0 15px;"><strong>Options</strong> </th>
                                    </tr>
                                </thead>
                                @foreach($capture_contents as $row)
                                <tr>
                                   
                                    <td></td>
                                    <td style="padding:0 15px 0 15px;">{{$row->URL}}</td>
                                    <td style="padding:0 15px 0 15px;">
                                    <span>
                                {!!Form::open(['method'=>'get','id'=>'assessmentForm','route' =>['Download',$row->id]])!!}
                                    {!! Form::submit('Download', ['class' => 'btn submitbtn ']) !!} 
                                       | 
                                {!! Form::close() !!} 
                                {!!Form::open(['method'=>'delete','id'=>'updateForm','route' =>['Delete',$row->id]])!!}
                                    {!! Form::submit('Delete', ['class' => 'btn submitbtn btn-danger']) !!}                   
                                {!! Form::close() !!}  
                                </span>
                                       </td>
                                     <td><input type="hidden" value="{{$row->id}}"></td>
                                </tr>
                                @endforeach
                            </table>
                        {{-- </div>  --}}
                </div>
            </div>
        </div>
    </div>
@endsection
