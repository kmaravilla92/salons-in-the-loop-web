<template>
	<li>
		<a 
		:href="'/account/'+user['type']+'#/dashboard'"
		class="noti-holder">
			<img src="/frontsite/images/noti-ico.png" alt="">
			<div class="noti-count ease" v-if="newNotifications.length">
				<p>{{newNotifications.length}}</p>
			</div>
		</a>
		<div class="notif-popup">
			<PopupItem
				v-for="notification in notifications"
				:notification="notification"
			></PopupItem>
			<a href="#" class="see">SEE ALL</a>
		</div>
	</li>
</template>

<script>
	import PopupItem from './PopupItem.vue'
	const notificationsUrl = apiBaseUrl + 'rest/users/'+userId+'/notifications'
	export default {
		props: ['user'],
		data() {
	        return {
	            notifications: []
	        }
	    },
	    computed: {
	    	newNotifications() {
	    		return this.notifications.filter((notification)=>{
	    			return notification.read_at == null;
	    		});
	    	}
	    },
		mounted() {
	        $(document).ready(function(){
	            $('.noti-holder').click(function(){
	                $('.notif-popup').slideToggle( "slow", function() {});
	            });
	        });

	        this.fetchNotifications();
	    },
	    components: {
	    	PopupItem
	    },
	    methods: {
	        fetchNotifications() {
	            let vm = this;
	            axios
	                .get(notificationsUrl, {
	                	params: {
	                		limit: 5
	                	}
	                })
	                .then((response)=>{
	                    vm.notifications = response.data;
	                }, (error)=>{

	                });
	        },
	        readNotifications() {
	            let vm = this;
	            axios
	                .get(notificationsUrl, {
	                	params: {
	                		limit: 5
	                	}
	                })
	                .then((response)=>{
	                    vm.notifications = response.data;
	                }, (error)=>{

	                });
	        }
	    }
	}
</script>