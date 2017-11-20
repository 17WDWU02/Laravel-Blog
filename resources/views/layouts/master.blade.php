<html>
<head>
	<title>Blog - @yield('title')</title>
	<meta name="description" content="@yield('description')">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	@yield('styles')
</head>
<body>

	@include('partials._nav')

	@yield('content')

	@include('partials._footer')

	<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	@yield('scripts')
</body>
</html>