export default function(Vue){
	Vue.auth = {
		setToken: function(user){
			localStorage.setItem('user_token', user.id);
		},
		removeToken: function(){
			localStorage.removeItem('user_token');
		},
		isAuthenticated: function(){
			if(localStorage.getItem('user_token')){
				return true;
			}
			return false;
		}
	}

	Object.defineProperties(Vue.prototype, {
        $auth: {
            get() {
                return Vue.auth;
            }
        }
    });
}