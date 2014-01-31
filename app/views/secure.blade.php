<!DOCTYPE HTML>
<html>
	<head>
		<title>Secure Area</title>
	</head>
	<body>
		
		@foreach($user as $users)
		<h1>Welcome {{ $users->name }} to Secure Area</h1>
		@endforeach
		
	</body>
</html>