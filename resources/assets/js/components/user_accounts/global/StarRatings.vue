<template>
	<div class="rating-holder">
		<i class="fa fa-star" aria-hidden="true" v-for="star in stars"></i>
	</div>
</template>

<script>
	export default {
		props: ['rating'],
		computed: {
			stars() {
				let stars = [];
				for(let i = 0; i < this.rating; i++) {
					stars.push(i);
				}
				return stars;
			}
		}
	}
</script>