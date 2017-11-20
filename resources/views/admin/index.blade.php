@extends('layouts.admin')

@section('title', 'Admin Page')
@section('description', 'This is the admin Page')

@section('styles')

@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
			<ul class="nav nav-pills flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="#">Dashboard <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Blogs</a>
				</li>
			</ul>
		</nav>
		<div class="col-sm-9 ml-sm-auto col-md-10 pt-3">
			<h1>Admin Dashboard</h1>
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection



