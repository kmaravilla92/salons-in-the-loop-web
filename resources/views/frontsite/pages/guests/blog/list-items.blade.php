<div class="blog-holder">
	<a href="{{ $post['link'] }}">
		{{ $post['title'] }}
	</a>
	<p>Posted by <span>Admin</span></p>
	<div class="img-holder">
		<img src="{{ $post['featured_image'] }}" alt="">
	</div>
	<div class="content-holder">
		{!! $post['excerpt'] !!}
	</div>
</div>