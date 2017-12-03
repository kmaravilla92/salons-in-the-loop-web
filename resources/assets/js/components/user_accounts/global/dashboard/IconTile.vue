<template>
	<li>
		<router-link :to="link">
			<div class="noti-count ease" v-if="statistics_count != null">
				<p>{{statistics_count}}</p>
			</div>
			<div class="img-holder">
				<img :src="image" :alt="title">
			</div>

			<p class="ease">{{title}}</p>
		</router-link>
	</li>
</template>

<script>
	export default {
		props: ['link', 'title', 'image', 'statistics_count']
	}
</script>