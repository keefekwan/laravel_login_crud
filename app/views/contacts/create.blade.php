<!DOCTYPE HTML>
<html>
	<head>
		<title>Laravel CRUD - Create</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ URL::to('contacts') }}">Contacts</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="{{ URL::to('contacts') }}">View all contacts</a></li>
					<li><a href="{{ URL::to('contacts/create') }}">Create a Contact</a></li>
				</ul>
			</nav>

			<h1>Create a Contact</h1>

			<!-- Display creation errors -->
			{{ HTML::ul($errors->all()) }}

			{{ Form::open(array('url' => 'contacts')) }}

				<div class="form-group">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', Input::old('name'), ['class' => 'form-control']) }}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'Email') }}
					{{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}
				</div>

				<div>
					{{ Form::label('mobile', 'Mobile') }}
					{{ Form::text('mobile', Input::old('mobile'), ['class' => 'form-control']) }}
				</div>
				<br>

				{{ Form::submit('Create contact', ['class' => 'btn btn-primary']) }}
			{{ Form::close() }}
		</div>
	</body>
</html>