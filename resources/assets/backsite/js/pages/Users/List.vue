<template>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>
                    Users
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2> -->
                <div class="pull-right">
                    <router-link :to="{ name: 'users.create' }" class="btn bg-red btn-lg waves-effect">
                        <i class="material-icons">person_add</i>
                    </router-link>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- Basic Examples -->
            <table-list
                v-bind:headers="headers"
                v-bind:records="records"
            ></table-list>
            <!-- #END# Basic Examples -->
        </div>
    </section>
</template>

<script>
	export default {
        data(){
            return {
                headers: [
                    {key: 'name', title: 'Name'},
                    {key: 'position', title: 'Position'},
                    {key: 'office', title: 'Office'},
                    {key: 'age', title: 'Age'},
                    {key: 'start_date', title: 'Start date'},
                    {key: 'salary', title: 'Salary'}
                ],
                records: []
            }
        },
        methods: {
            fetchList(){
                var vm = this;
                    axios
                        .get('//api.sitl.dev/v1/users')
                        .then(function(response){
                            vm.records = response.data.data;
                        }).catch(function(error){
                            alert('Error: ' + error);
                        });
            }
        },
		mounted() {
            this.fetchList();
        }
	}
</script>