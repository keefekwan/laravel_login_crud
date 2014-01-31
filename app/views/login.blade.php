<!DOCTYPE HTML>
<html>
	<head>
		<title>Login form</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand"><href="{{ URL::to('login') }}">Login</a>
			</div>

		</nav>

		{{ Form::open(array('url' => 'login')) }}
			<h1>Login</h1>

			<!-- If there are login errors, show them here -->
			<p>
				{{ $errors->first('email') }}
				{{ $errors->first('password') }}
			</p>

			<p>
				{{ Form::label('email', 'Email Address') }}
				{{ Form::text('email', Input::old('email'), array('placeholder' => 'name@example.com')) }}
			</p>
		
			<p>
				{{ Form::label('password', 'Password') }}
				{{ Form:: password('password') }}
			</p>

			<p>{{ Form::submit('Submit') }} </p>
		{{ Form::close() }}
	</div>
	</body>
</html>