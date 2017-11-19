<html>
<head>
	<title>Laravel Home Page</title>
	{{-- <link rel="stylesheet" type="text/css" href="/css/style.css"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<h1>This is the home page</h1>
	<ul>
		<li><a href="{{ route('blog.index') }}">Blog</a></li>
		<li><a href="/contact">Contact</a></li>
	</ul>
</body>
</html>