@include('frontsite.partials.global.header')
	@if(isset($is_spa))
		<div id="app">
			@yield('spa_content')
		</div>
	@else
		@yield('content')
	@endif
	@include('frontsite.components.jquery-validation')
	@include('frontsite.components.ajaxify-forms')
	@include('frontsite.components.toastr')
	
@include('frontsite.partials.global.footer')