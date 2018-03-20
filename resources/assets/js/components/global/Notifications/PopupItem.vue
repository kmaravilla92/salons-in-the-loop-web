<template>
	<div 
		:class="{'pro-holder': true, 'notif-holder': true, 'general-notif': notification.data.title}"
	>
		<div class="img-holder">
			<div class="img-over">
				<img src="/frontsite/images/pro1.jpg" alt="" v-if="notification.data.image">
				<img src="/frontsite/images/sitl-img.png" alt="" v-if="!notification.data.image">
			</div>
		</div>
		<div class="description">
			<h3 v-if="notification.data.title">{{notification.data.title}}</h3>
			<p v-html="notification.data.message"></p>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['notification'],
	}
</script>