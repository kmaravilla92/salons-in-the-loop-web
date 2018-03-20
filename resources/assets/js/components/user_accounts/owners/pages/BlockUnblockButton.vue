<template>
	<div>
		<a 
			href="#" 
			class="btn btn-grey-b" 
			@click.prevent="block('0', owner_id, pro.id)" 
			v-if="canBlock">
			Block		
		</a>
		<a 
			href="#" 
			class="btn btn-grey-b" 
			@click.prevent="block('1', owner_id, pro.id)" 
			v-if="!canBlock">
			Unblock
		</a>
	</div>
</template>

<script>
	export default {
		props: ['owner_id', 'pro', 'CAN_BLOCK'],
		data() {
			return {
				CAN_BLOCK_LOCAL: '-'
			}
		},
		computed: {
			canBlock() {
				if(this.CAN_BLOCK_LOCAL != '-'){
					return this.CAN_BLOCK_LOCAL;
				}

				const owner_blockings = this.pro.pro_profile.owner_blocking;
				const owner_id = this.owner_id;
				let can_block_LOCAL = true;
				console.log(owner_blockings);
				owner_blockings.forEach(function(owner_blocking){
					if(owner_blocking.owner_id == owner_id && owner_blocking.status == '0'){
						can_block_LOCAL = false;
						return false;
					}
				});
				return can_block_LOCAL;
			}
		},
		methods: {
			block(status, owner_id, professional_id) {
				const vm = this;
				axios
					.post(
						apiBaseUrl + 'rest/owners/'+this.user_id+'/blocked-pros',
						{
							owner_id: owner_id,
							professional_id: professional_id,
							status: status
						}
					)
					.then((response)=>{
						if(response.data.success){
							if(status == '1'){
								vm.CAN_BLOCK_LOCAL = true;
								vm.$toastr('success', 'Pro successfully unblocked.', 'Pro Blocking');
							}else{
								vm.CAN_BLOCK_LOCAL = false;
								vm.$toastr('success', 'Pro successfully blocked.', 'Pro Blocking');
							}
						}
					},(error)=>{
						vm.$toastr('error', 'Something went wrong. Please try again later.', 'Services Update');
					});
			},
		}
	}
</script>