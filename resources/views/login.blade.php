<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="{{ asset('assets/assets2/img/kimfo-hitam.jpeg') }}">
    <meta charset="utf-8">
    <title>Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

<link href="{{ asset('assets/assets_login/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/assets_login/css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/assets_login/css/font-awesome.css') }}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

<link href="{{ asset('assets/assets_login/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/assets_login/css/pages/signin.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
	<div class="navbar navbar-fixed-top">

	<div class="navbar-inner">

		<div class="container">

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<a class="brand" href="index.html">
				Aplikasi Ticketing
			</a>

			</div><!--/.nav-collapse -->

		</div> <!-- /container -->

	</div> <!-- /navbar-inner -->

</div> <!-- /navbar -->



<div class="account-container">

	@if (session()->has('loginError'))
		<div class="alert alert-danger" role="alert">
			{{ session('loginError') }}
		</div>
	@endif

	<div class="content clearfix">

		<form action="{{ route('login-aksi') }}" method="post">
            @csrf
			<h1>Login</h1>

			<div class="login-fields">

				<p>Please provide your details</p>

				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->

				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->

			<div class="login-actions">

				<button class="button btn btn-success btn-large">Sign In</button>

			</div> <!-- .actions -->

		</form>

	</div> <!-- /content -->

</div> <!-- /account-container -->

<script src="{{ asset('assets/assets_login/js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ asset('assets/assets_login/js/bootstrap.js') }}"></script>

<script src="{{ asset('assets/assets_login/js/bsignin.js') }}"></script>

</body>

</html>
