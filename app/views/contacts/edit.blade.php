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

			<h1>Edit a Contact</h1>

			<!-- Display creation errors -->
			{{ HTML::ul($errors->all()) }}

			{{ Form::model($contacts, array('route' => array('contacts.update', $contacts->id), 'method' => 'PUT')) }}

				<div class="form-group">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', null, array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'Email') }}
					{{ Form::email('email', null, array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('mobile', 'Mobile') }}
					{{ Form::text('mobile', null, array('class' => 'form-control')) }}
				</div>

				{{ Form::submit('Edit Contacts', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</body>
</html>