@extends('layouts.master')
@section('Title')
    Dashboard
@endsection
@section('content')
    <div class="jumbotronCus">
    <div class="container containerCus">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Hello,  {{ Auth::user()->name }}</h2>
                        <br>
                        <p>Kindly Use following button to pay your subsription charges</p>
                        <br>

{{-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="TLCKQTE7D38AY">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> --}}

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="S8Y7NWTV6GYXE">
{{-- <input type="hidden" name="name" value="{{ Auth::user()->name }}" /> --}}
{{-- <input type="hidden" name="payer_email" value="{{ Auth::user()->email }}" /> --}}
<input type="hidden" name="custom" value="{{ Auth::user()->id }}" />
{{-- <input type="hidden" name="return" value="http://salespageninja.com/doneP" /> 
<input type="hidden" name="cancel_return" value="http://salespageninja.com/cancelP" />  --}}
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>





{{-- <input type="hidden" name="userId" value="{{ Auth::user()->id }}" /> 
<input type="hidden" name="name" value="{{ Auth::user()->name }}" />
<input type="hidden" name="payer_email" value="{{ Auth::user()->email }}" />
<input type="hidden" name="return" value="http://salespageninja.com/doneP" /> 
<input type="hidden" name="cancel_return" value="http://salespageninja.com/cancelP" />  --}}






                    {{-- <form action="https://www.sandbox.paypal.com/us/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="6NVXSGDQWARNY">
                        <input type="hidden" name="userId" value="{{ Auth::user()->id }}" /> 
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}" />
                        <input type="hidden" name="payer_email" value="{{ Auth::user()->email }}" />
                        <input type="hidden" name="currency_code" value="USD" />
                        <input type="hidden" name="item_name" value="SubscriptionCharges" /> 
                        <input type="hidden" name="return" value="http://salespageninja.com/doneP" /> 
<input type="hidden" name="cancel_return" value="http://salespageninja.com/cancelP" /> 

                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form> --}}

                        <br>   
                        <br>             
                            <div class="jumbotronCus" >
                                    <div class="row url-getter">
                                        <div class="col-md-offset-2 col-md-8">
                                            {!! Form::open(array('route' => 'Capture', 'class' => 'form','id'=> 'siteform','name'=>'siteform')) !!}
                                                <div class="form-group">
                                                    <input type="url" class="form-control" name="site_url" id="site_url" placeholder="Enter your site address">
                                                    <span class="help-block"></span>
                                                </div>
                                                <button data-loading-text="Please wait..." type="submit" id="url_getter" class="btn btn-primary  btn-default col-md-offset-5">Submit</button>
                                                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                                {{-- {{ csrf_field() }} --}}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-8" >
                                            <h2 class="text-center page-title" style="font-family: 'Tangerine', serif;" >Your Web Page</h2>
                                            <iframe style="border:None;height:100%;width:100%;overflow: hidden; pointer-events:none; " scrolling ="no" id="site"></iframe>		
                                            {!! Form::open(array('route' => 'Save', 'class' => 'form','id'=> 'siteform','name'=>'siteform')) !!}
                                            <button type="submit" id="savesrc" class="btn btn-primary col-md-offset-5" >Save HTML</button>
                                            <input type="hidden" id="url_hidden" name="url_hidden" value="">
                                            <input type="hidden" id="site_url2" name="site_url2" value="">
                                            {{-- {{ csrf_field() }} --}}
                                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                            {!! Form::close() !!}
                                         </div>
                                    </div>
                            </div>
                </div>
            </div>
        </div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>

@endsection

