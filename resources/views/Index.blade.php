@extends('layouts.master')
@section('Title')
    Welcome to Sales Page
@endsection

@section('content')
<div class="jumbotron">
    <div class="container">
		<h1 class="text-center page-title" style="font-family: 'Tangerine', serif;" >Welcome to Sales Page Ninja</h1>
			<div class="row url-getter">
				<div class="col-md-offset-2 col-md-8">
					{!! Form::open(array('route' => 'Capture', 'class' => 'form','id'=> 'siteform','name'=>'siteform')) !!}
						<div class="form-group">
							<input type="url" class="form-control" name="site_url" id="site_url" placeholder="Enter your site address">
							<span class="help-block"></span>
						</div>
						<button data-loading-text="Please wait..." type="submit" id="url_getter" class="btn btn-default btn-primary">Submit</button>
						{!! Form::close() !!}
				</div>
			</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-10" style="padding:0% 0% 0% 16%">
				<h2 class="text-center page-title" style="font-family: 'Tangerine', serif;" >Your Web Page</h2>
				<iframe style="border:None;height:100%;width:100%;overflow: hidden; pointer-events:none; " scrolling ="no" id="site"></iframe>		
			</div>
		</div>
	</div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>
@endsection
