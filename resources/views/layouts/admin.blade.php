<html>
<head>
	<title>Admin - @yield('title')</title>
	<meta name="description" content="@yield('description')">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
	@yield('styles')
</head>
<body>

	@include('partials._nav_admin')

	<div class="container-fluid">
		<div class="row">
			<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
				@include('partials._admin_sidebar')
			</nav>
			<div class="col-sm-9 ml-sm-auto col-md-10 pt-3">
				<h1>Admin Dashboard</h1>
				<hr>
				@yield('content')
			</div>
		</div>
	</div>


	<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	@yield('scripts')
</body>
</html>