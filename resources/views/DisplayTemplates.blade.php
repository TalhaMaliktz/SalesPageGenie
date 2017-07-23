@extends('layouts.master')
@section('Title')
    Saved Templates
@endsection

@section('content')
    <div class="jumbotronCus">
        <div class="container containerCus">
            <div class="panel panel-default">
                <div class="panel-body">
                     <h2>Hello,  {{ Auth::user()->name }}</h2>
                     <p><a href="{{ route('Create')}}"> Create a new Template!</a></p>
                     <p>Following are the Templates you saved in Sales Page Genie</p>
                        @if(Session::has('message'))
                        <p style="width:100%" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                            <table class="table-responsive css-serial table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="padding:0 15px 0 15px;" ><strong>Title</strong></th>
                                        <th style="padding:0 15px 0 15px;" ><strong>Created At</strong></th>
                                        {{-- <th style="padding:0 15px 0 15px;" ><strong>URL</strong></th> --}}
                                        <th style="padding:0 15px 0 15px;"><strong>Options</strong> </th>
                                    </tr>
                                </thead>
                                @foreach($default_template as $row)
                                <tr>
                                    <td></td>
                                    <td style="padding:0 15px 0 15px;">{{$row->Title}}</td>
                                    <td style="padding:0 15px 0 15px;">{{$row->created_at}}</td>
                                    {{-- <td style="padding:0 15px 0 15px;">{{$row->URL}}</td> --}}
                                    <td style="padding:0 15px 0 15px;">
                                    <span>
                                {!!Form::open(['method'=>'get','id'=>'assessmentForm','route' =>['DownloadTS',$row->id]])!!}
                                    {!! Form::submit('Download', ['class' => 'btn submitbtn ']) !!} 
                                       | 
                                {!! Form::close() !!} 
                                {!!Form::open(['method'=>'delete','id'=>'updateForm','route' =>['DeleteTS',$row->id]])!!}
                                    {!! Form::submit('Delete', ['class' => 'btn submitbtn btn-danger']) !!}                   
                                {!! Form::close() !!}  
                                </span>
                                       </td>
                                     <td><input type="hidden" value="{{$row->id}}"></td>
                                </tr>
                                @endforeach
                            </table>
                </div>
            </div>
        </div>
    </div>
@endsection