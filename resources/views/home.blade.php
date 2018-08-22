<!DOCTYPE html>
<html>
<head>
	<title>URL Shorten</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<h1>Shorten URL</h1>	
				@if ($errors->any())
				    <div class="alert alert-danger">
			            @foreach ($errors->all() as $error)
			                {{ $error }}<br />
			            @endforeach
				    </div>
				@endif
				{!! Form::open(['url'=>'shorten']) !!}
					<div class="form-group">
			    		<label for="exampleInputEmail1">URL</label>
			    		{!! Form::text('url',null,['class'=>'form-control','placeholder'=>'Input URL For Shorten']) !!}	
			  		</div>
			  		<button type="submit" class="btn btn-primary">Submit</button>
				{!! Form::close() !!}
			</div>
			<div class="col">
				@if(session()->has('success'))
					<h1>Shorten Code</h1>
				    <div class="alert alert-success">
				        {!! session()->get('success') !!}
				    </div>
				@endif
				@if(session()->has('info'))
					<h1>Shorten Code</h1>
				    <div class="alert alert-info">
				        {!! session()->get('info') !!}
				    </div>
				@endif				
			</div>
		</div>
	</div>
</body>
</html>