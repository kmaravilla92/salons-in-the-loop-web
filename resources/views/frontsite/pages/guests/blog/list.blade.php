@extends('frontsite.master')

@section('content')
	<section id="main-wrapper" class="inner about">
		<div class="title-holder">
			<div class="wrapper">
				<h3>Stay in the Loop</h3>
			</div>
		</div>
		<div class="wrapper">
			@if(session('messages'))
				@foreach(session('messages') as $message)
					{{ $message }}
				@endforeach
			@endif
			<div class="content-section blog-container">
				<div class="blog-listing">
					@each('frontsite.pages.guests.blog.list-items', $posts, 'post')
					<div class="pagination">
						<a href="#">First</a>
						<a href="#">Previous</a>
						<a href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">Next</a>
						<a href="#">Last</a>
					</div>
				</div>
				<div class="blog-sidebar">
					<div class="recent-post">
						<h3>Recent Post</h3>
						<ul>
						 	@each('frontsite.pages.guests.blog.recent-list-items', $recent_posts, 'post')
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection