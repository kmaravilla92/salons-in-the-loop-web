<template>
	<div class="spinner-holder">
		<spinner
		  :status="status"
		  :color="color"
		  :size="size"
		  :depth="depth"
		  :rotation="rotation"
		  :speed="speed"></spinner>
	</div>
</template>

<script>
	import Spinner from 'vue-spinner-component/src/Spinner.vue'
	export default {
		props: {

		    status: {
		        type: Boolean,
		        default: true
		    },

		    rotation: {
		        type: Boolean,
		        default: true
		    },

		    size: {
		        type: Number,
		        default: 60
		    },

		    depth: {
		        type: Number,
		        default: 3
		    },

		    speed: {
		        type: Number,
		        default: 1.0
		    },

		    color: {
		        type: String,
		        default: '#cb4e4e'
		    }

		},

		components: {
			Spinner
		}
	}
</script>

<style lang="scss">
	.spinner-holder {
		.sl-spinner {
			margin: 0 auto;
		}
	}
</style>