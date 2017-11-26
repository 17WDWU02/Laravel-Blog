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

		@if($posts)
			@foreach($posts->chunk(3) as $postsRow)
				<div class="row">
					@foreach($postsRow as $post)
						<div class="col-xs-12 col-sm-4">
							<div class="card">
								<img class="card-img-top" src="/images/uploads/{{$post->image_name}}-thumb.jpg" alt="">
								<div class="card-body">
									<h4 class="card-title">{{$post->post_title}}</h4>
									<a href="{{ route('blog.show', $post->id )}}" class="btn btn-primary">Go to Post</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
			{!! $posts->links() !!}
		@else
			<p>There are currently no posts in this blog</p>
		@endif

	</div>
@endsection

@section('scripts')

@endsection



