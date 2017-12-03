<template>
	<div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SITL<b> Admin</b></a>
            <small>SITL Admin developed by <a href="http://thehappyweekend.com" target="_blank" style="font-size: 100%; display: inline;"><i>The Happy Weekend Company</i></a></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" v-on:submit="login">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus v-model="username">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required v-model="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
        data(){
            return {
                username: '',
                password: ''
            }
        },
		methods: {
            login(event){
                event.preventDefault();
                if(this.username == 'admin' && this.password == 'admin'){
                    this.$parent.authenticateUser({
                        id: 1,
                        username: this.username,
                        password: this.password
                    })
                }else{
                    alert('Invalid credentials');
                }
            }
        }
	}
</script>