<template>
	<div class="content-container acct-settings">
		<div class="inner-title">
			<h3>Card Information</h3>
		</div>
		<div class="form-holder">

			<ul>
				<li>
					<label for="">Name On Card</label>
					<input type="text" name="" value="" placeholder="">
				</li>
				<li>
					<label for="">Card Number</label>
					<input type="text" name="" value="" placeholder="">
				</li>
				<li class="clearfix expi">
					<label for="" class="f-left">Expiration Date</label>
					<label for="" class="f-right">Security Code <i class="fa fa-question-circle" aria-hidden="true" style="color:#4f81bb;"></i></label>
					<div class="clearfix"></div>
					<input type="text" name="" value="" placeholder="Month" class="f-left width-33 expi-inp">
					<input type="text" name="" value="" placeholder="Year" class="f-left width-33 expi-inp year">
					<input type="text" name="" value="" placeholder="Code" class="f-left width-33 code">
				</li>
				<li>
					<label for="">Credit Card Type</label>
					<input type="text" name="" value="" placeholder="">
				</li>

			</ul>
			<input type="submit" name="" value="SAVE" class="btn btn-blue btn-slim">
		</div>
		<br><br>
		<div class="inner-title">
			<h3>Billing Address</h3>
		</div>
		<div class="form-holder">
			<ul>
				<li>
					<label for="">Address (Street,  house, apt)</label>
					<input type="text" name="" value="" placeholder="">
				</li>
				<li>
					<label for="">City / Town</label>
					<input type="text" name="" value="">
				</li>
				<li>
					<label for="">Postal</label>
					<input type="text" name="" value="">
				</li>
				<li>
					<label for="">State / Province</label>
					<input type="text" name="" value="">
				</li>
				<li>
					<label for="">Country</label>
					<select class="" name="">
						<option value=""></option>
					</select>
				</li>
			</ul>
			<input type="submit" name="" value="SAVE" class="btn btn-blue btn-slim">
		</div>
		<br><br>

	</div>
</template>

<script>
	export default {
		mount() {
			$('.main-wrapper').addClass('payment-info')
		}
	}
</script>