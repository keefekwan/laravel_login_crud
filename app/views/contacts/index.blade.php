<!DOCTYPE HTML>
<html>
	<head>
		<title>Laravel CRUD - Contacts</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			
			<nav class="navbar navbar-inverse">
				<div class="navbar-header">
					<a class="navbar-brand"> <href="{{ URL::to('contacts') }}">Contacts</a>
				</div>

				<u class="nav navbar-nav">
					<li><a href="{{ URL::to('contacts') }}">View all Contacts</a></li>
					<li><a href="{{ URL::to('contacts/create') }}">Create a Contact</a></li>
					<li><a href="{{ URL::to('logout') }}">Logout</a></li>
				</ul>
			</nav>

			<h1>All Contacts</h1>

			<!-- Show all messages -->
			@if (Session::has('message'))
				<div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif

			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Email</td>
						<td>Mobile</td>
						<td>Actions</td>
					</tr>
				</thead>

				<tbody>
					@foreach($contacts as $key => $value)
						<tr>
							<td>{{ $value->id     }}</td>
							<td>{{ $value->name   }}</td>
							<td>{{ $value->email  }}</td>
							<td>{{ $value->mobile }}</td>
						<!-- Display add, show, edit and delete buttons -->
							<td>
								{{ Form::open(array('url' => 'contacts/' . $value->id, 'class' => 'form-inline')) }}
									<!-- Show the contact (uses the show method found in GET /contacts/{id} -->
									<a class="btn btn-small btn-success" href="{{ URL::to('contacts/' . $value->id) }}">Show contact</a>

									<!-- Edit the contact (uses the edit method found in GET /contacts{id}/edit -->
									<a class="btn btn-small btn-info" href="{{ URL::to('contacts/' . $value->id . '/edit') }}">Edit</a>

									<!-- Delete the contact (uses the destroy method DESTROY /contacts/{id} -->
									{{ Form::hidden('_method', 'DELETE') }}
									{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</body>	
</html>