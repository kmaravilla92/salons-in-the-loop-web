<template>
	<li>
		<div class="content-holder">
			<h5><span>User Type</span> {{posted_request.type}}</h5>
			<router-link v-bind:to="'/posted-requests/' + posted_request.id">
				{{posted_request.title}}
			</router-link>
			<br>
			<p><span>Posted</span> {{posted_request.posted_at}}</p>

		</div>
		<div class="content-holder renters">
			<p><span>{{posted_request.renders_applied_count}} </span> Renters Applied</p>
		</div>
		<div class="btn-holder">
			<router-link v-bind:to="'/posted-requests/' + posted_request.id" class="btn btn-blue-b btn-slim">	
				See details
			</router-link>
		</div>
	</li>
</template>

<script>
	export default {
		props: ['posted_request'],
	}
</script>