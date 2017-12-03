@if(config('app.recaptcha.enabled'))
	@push('css_head')
		<style>
			.g-recaptcha > div { margin: 0 auto;}
	    	.hidden_recaptcha { visibility: hidden;}
		</style>
	@endpush
	
	@push('js_tail')
		<script src='https://www.google.com/recaptcha/api.js'></script>
	@endpush

	<input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
	<div class="g-recaptcha" data-sitekey="{{ config('app.recaptcha.sitekey') }}"></div>
@endif
