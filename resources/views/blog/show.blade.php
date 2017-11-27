@extends('layouts.master')

@section('title', 'Single Blog Page')
@section('description', 'This is a single Blog Page')

@section('styles')

@endsection

@section('content')
	<div class="container">
		<h1>{{ $post->post_title }}</h1>
		<p><small>Created at : {{$post->created_at}} by {{$userInfo->name}}</small></p>
		<hr>
		<div class="row">
			<div class="col col-xs-4">
				<img src="/images/uploads/{{$post->image_name}}-large.jpg" alt="{{$post->post_title}}">
			</div>
			<div class="col col-xs-8">
				<p>{{$post->post_description}}</p>
			</div>
		</div>
		@if(Auth::user())
			@if($post->userCanEdit(Auth::user()))
			<div class="row">
				<a class="btn btn-outline-primary" href="{{ route('blog.edit', $post->id ) }}" role="button">Edit Post</a>
				
				{{Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $post->id]])}}
					<button type="submit" class="btn btn-outline-danger">Delete Post</button>
				{{Form::close()}}
			</div>
			@endif
		@endif		

	</div>
@endsection

@section('scripts')

@endsection



