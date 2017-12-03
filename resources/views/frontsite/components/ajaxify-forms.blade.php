@push('css_head')
@endpush

@push('js_tail')
<script src="/frontsite/js/ajaxify-forms.js"></script>
<script>
	$(function(){
		$('body .ajaxify').ajaxifyForm();
	});
</script>
@endpush