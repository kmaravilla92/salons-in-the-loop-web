<li>
	<a href="{{ $post['link'] }}">
		<div class="img-holder">
			<img src="{{ $post['featured_image'] }}" alt="">
		</div>
		<div class="content-holder">
			<p>{!! $post['excerpt'] !!} ...</p>
		</div>
	</a>
</li>