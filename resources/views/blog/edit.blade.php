@extends('layouts.master')

@section('title', ' Edit Post')
@section('description', 'Edit a single post')

@section('styles')
<style type="text/css">
	h1{
		color:#e67e22;
	}
</style>
@endsection

@section('content')
<div class="container">
	<h1>Edit Post - {{$post->post_title}}</h1>

	@if($errors->all() )
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	{{ Form::model($post, array('route' => array('blog.update', $post->id), 'method' => 'PUT', 'files' => true) ) }}

		<div class="form-group">
			{{ Form::label('post_title', 'Post Title')}}
			{{ Form::text('post_title', null, array('class' => 'form-control'))}}
		</div>

		<div class="form-group">
			{{ Form::label('post_description', 'Body of Post') }}
			{{ Form::textarea('post_description', null, array('class' => 'form-control'))}}
		</div>
		<p>current image</p>
		<img src="/images/uploads/{{$post->image_name}}-thumb.jpg">
		<div class="form-group">

			{{ Form::label('image', 'Post Image') }}
			{{ Form::file('image', array('class' => 'form-control'))}}
		</div>

		{{ Form::submit('Edit Post', array('class' => 'btn btn-primary')) }}
	{{ Form::close()}}


</div>
@endsection

@section('scripts')
{{-- script to remove current image when change on input field --}}
@endsection



