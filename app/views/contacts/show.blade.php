<!DOCTYPE HTML>
<html>
	<head>
		<title>Laravel Crud - Show Contact</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ URL::to('contacts') }} ">Contacts</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="{{ URL::to('contacts') }}">View all Contacts</a></li>
					<li><a href="{{ URL::to('contacts/create') }}">Create a Contact</a></li>
				</ul>
			</nav>
			<div class="jumbotron text-center">
				<h1>{{ $contacts->name }}</h1>
					<p>
						<strong>Email:</strong> {{ $contacts->email }}<br>
						<strong>Mobile:</strong> {{ $contacts->mobile }}
					</p>
			</div>
		</div>
	</body>
</html>