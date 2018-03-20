<template>
	<div class="side-menu">
		<div 
			:class="profile_class">
			<div class="img-holder">
				<img 
					:src="user.profile_pic.path" 
					:alt="user.profile_pic.name"
				>
			</div>
			<h3>{{user.full_name}}</h3>
			<p>{{user.profile.full_address}}</p>
			<a href="#" @click.prevent="">Notifications <span class="ease">{{user.notifications.length}}</span></a>
		</div>
		<div class="menu-listing">
			<ul>
				<li
					v-for="item in items"
					:class="{sub: item.meta.has_children}">
					<router-link 
						:to="item.path" 
						v-html="item.meta.title"
					>		
					</router-link>
					<ul v-if="item.meta.has_children">
						<li v-for="child_item in item.meta.children">
							<router-link :to="child_item.path" v-html="child_item.meta.title"></router-link>
						</li>
					</ul>
				</li>
				<li><a href="/logout-user">Log Out</a></li>
			</ul>
		</div>
	</div>
</template>

<script>
    export default {
    	props: ['user', 'items'],
    	mounted() {
			$(".menu-listing" ).accordion({
				collapsible: true,
				heightStyle: "content",
				header: "> ul > li > a"
			});
    	},
    	data() {
    		return {
    			profile_class: 'profile-holder '+(user.type == 'professional' ? 'pro' : user.type)+'-bg'+(user.type != 'professional' ? '-dark' : '')
    		}
    	},
    }
</script>