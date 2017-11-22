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

	@if($errors->all() )
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	{{ Form::open(array('url' => 'blog', 'files' => true)) }}

		<div class="form-group">
			{{ Form::label('post_title', 'Post Title')}}
			{{ Form::text('post_title', '', array('class' => 'form-control'))}}
		</div>

		<div class="form-group">
			{{ Form::label('post_description', 'Body of Post') }}
			{{ Form::textarea('post_description', '', array('class' => 'form-control'))}}
		</div>

		<div class="form-group">
			{{ Form::label('image', 'Post Image') }}
			{{ Form::file('image', array('class' => 'form-control'))}}
		</div>

		{{ Form::submit('Add New Post', array('class' => 'btn btn-primary')) }}
	{{ Form::close()}}


</div>
@endsection

@section('scripts')

@endsection



