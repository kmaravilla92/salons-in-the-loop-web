@php
	$menu_items = [
		['route'=>route('frontsite.guests.home'), 'slug' => '*home', 'label'=>'HOME'],
		['route'=>route('frontsite.guests.how-it-works'), 'slug' => '*how-it-works', 'label'=>'HOW IT WORKS'],
		['route'=>route('frontsite.guests.about-us'), 'slug' => '*about-us', 'label'=>'ABOUT US'],
		['route'=>route('frontsite.guests.blog'), 'slug' => '*blog*', 'label'=>'BLOG'],
		['route'=>route('frontsite.guests.contact-us'), 'slug' => '*contact-us', 'label'=>'CONTACT US'],
	]
@endphp
<div class="navigation">
	<ul>
		@foreach($menu_items as $menu_item)
			@php
				$classes = Request::is($menu_item['slug']) ? 'active' : '';
			@endphp
			<li>
				<a href="{{ $menu_item['route'] }}" class="{{ $classes }}">
					{{ $menu_item['label'] }}
				</a>
			</li>
		@endforeach
	</ul>
</div>