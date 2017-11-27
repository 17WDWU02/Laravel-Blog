@extends('layouts.master')

@section('title', 'Serach results')
@section('description', 'List of Search Results')

@section('styles')

@endsection

@section('content')
	<div class="container">
		<h1>Search Results for: </h1>
		<hr>
		@if($searchResults)
			@foreach($searchResults as $result)
			<div class="col-xs-12">
				<h3>{{$result->post_title}}</h3>
				<p>{{$result->post_description}}</p>
				<a href="{{ route('blog.show', $result->id)}}">go to post</a>
			</div>
			@endforeach
		@else
			<p>There was no results for your query</p>
		@endif
	</div>
@endsection

@section('scripts')

@endsection



