<!DOCTYPE html>
<html>
<head>
	<title>Author Registration</title>
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
	<div class="col-md-6 col-md-offset-3 main">
		<div class="mainForm">		
			<h2>Author registration form</h2>
			<form action="/authorRegistration/submitted" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for='first_name'>First Name</label>
					<input id='first_name' name='first_name' type="text" class="form-control">		
				</div>
				<div class="form-group">
					<label for='last_name'>Last Name</label>
					<input id='last_name' name='last_name' type="text" class="form-control">		
				</div>
				<div class="form-group">
					<label for='email'>E-mail</label>
					<input id='email' name='email' type="email" class="form-control">		
				</div>
				<div class="form-group">
					<label for='password'>Password (minimum 8 character)</label>
					<input id='password' name='password' type="password" class="form-control">	
				</div>
				<div class="form-group">
					<label for='password2'>Password again</label>
					<input id='password2' name='password2' type="password" class="form-control">		
				</div>

				<input type="submit" class="btn btn-primary" id='submit' value="Apply for registration">
			</form>
			<p style='color:red' id='notification'>
		</div>
		<ul>
		@foreach($errors as $error)
		<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
	<script type="text/javascript" src='
js/jquery-3.0.0.min.js'></script>
<script src='js/passMatch.js'></script>
</body>
</html>