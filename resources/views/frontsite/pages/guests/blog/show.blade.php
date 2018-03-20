@extends('frontsite.master')

@section('content')
	<section id="main-wrapper" class="inner about">
		<div class="title-holder">
			<div class="wrapper">
				<h3>Stay in the Loop</h3>
			</div>
		</div>
		<div class="wrapper">
			<div class="content-section blog-container blog-detail">
				<div class="blog-listing">
					<div class="blog-holder">
						<h3>{{ $post['title'] }}</h3>
						<p>Posted by <span>Admin</span></p>

						<div class="content-holder">
							{!! $post['content'] !!}
						</div>
						<div class="pull-left">
							@if(isset($post['previous_post']))
								<a href="{{ $post['previous_post']['link'] }}" class="f-right">Read Previous Article</a>
							@endif
						</div>
						<div class="pull-right">
							@if(isset($post['next_post']))
								<a href="{{ $post['next_post']['link'] }}" class="f-right">Read Next Article</a>
							@endif
						</div>
						<div class="clearfix"></div>
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