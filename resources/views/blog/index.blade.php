@extends('layouts.master')

@section('title', 'Blog Page')
@section('description', 'This is our blog page, all our blog posts are listed here')

@section('styles')
<style type="text/css">
	h1{
		color:blue;
	}
</style>
@endsection

@section('content')
	<div class="container">
		<h1>This is the blog page</h1>

		@if(Auth::user())
		<a class="btn btn-outline-primary" href="{{ route('blog.create') }}" role="button">Add New Post</a>
		@endif
		
		<hr>
		<div class="row">
			<div class="col">
				<div class="card">
					<img class="card-img-top" src="http://via.placeholder.com/300x150" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Card title</h4>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<img class="card-img-top" src="http://via.placeholder.com/300x150" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Card title</h4>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<img class="card-img-top" src="http://via.placeholder.com/300x150" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Card title</h4>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection



