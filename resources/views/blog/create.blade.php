@extends('layouts.master')

@section('title', ' Add New Post')
@section('description', 'Add a new blog post to our site')

@section('styles')
<style type="text/css">
	h1{
		color:#e67e22;
	}
</style>
@endsection

@section('content')
<div class="container">
	<h1>Add new Blog Post</h1>

	<form method="post" action="" enctype="multipart/form-data">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" placeholder="post title" name="title">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea class="form-control" name="description" placeholder="Blog Content" rows="5"></textarea>
		</div>
		<div class="form-group">
			<label for="image">Image</label>
			<input type="file" class="form-control" name="image">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-outline-success">Submit New Blog Post</button>
		</div>
	</form>

</div>
@endsection

@section('scripts')

@endsection



