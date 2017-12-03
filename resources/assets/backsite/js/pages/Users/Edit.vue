<template>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>
                    Users
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2> -->
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Create User
                                <!-- <small>Different sizes and widths</small> -->
                            </h2>
                            <a href="#" @click="processForm">SUBMIT</a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12" v-for="field in fields" :key="field.key">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input 
                                                type="inputType(field.input_type)" 
                                                class="form-control"
                                                :id="field.key" 
                                                v-model="record[field.key]" 
                                                :placeholder="field.label" 
                                            >
                                            <!-- <label :for="field.key" v-html="field.label" class="form-label"></label> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>
</template>

<script>
	export default {
        props: {
            proccess_type: {
                default: 'edit',
                type: String
            },
            record_id: {
                default: 0,
                type: Number
            }
        },
        data(){
            return {
                record: {
                    first_name: '',
                    last_name: '',
                    email_address: '',
                    phone_number: '',
                    address: '',
                    city: '',
                    state: '',
                    zipcode: ''
                },
                fields: [
                    {key: 'first_name', label: 'First Name', input_type: 'text'},
                    {key: 'last_name', label: 'Last Name', input_type: 'text'},
                    {key: 'email_address', label: 'Email Address', input_type: 'text'},
                    {key: 'phone_number', label: 'Phone Nuber', input_type: 'text'},
                    {key: 'address', label: 'Address', input_type: 'text'},
                    {key: 'city', label: 'City', input_type: 'text'},
                    {key: 'state', label: 'State', input_type: 'text'},
                    {key: 'zipcode', label: 'Zip Code', input_type: 'text'}
                ]
            }
        },
        methods: {
            inputType(type){
                return type;
            },
            processForm($event){
                $event.preventDefault();
                var vm = this;
                    axios
                        .post('//api.sitl.dev/v1/users', this.record)
                        .then(function(response){
                            console.log(response);
                            vm.clearForm();
                        })
                        .catch(function(error){
                            alert('Error: ' + error);
                        });
            },
            fetchInitialRecord(){
                var vm = this;
                    if(vm.proccess_type == 'edit'){
                        axios
                            .get('//api.sitl.dev/v1/users/' + vm.record_id)
                                .then(function(response){
                                    console.log(response);
                                    vm.populateForm(response.data);
                                })
                                .catch(function(error){
                                    alert('Error: ' + error);
                                });
                    }
            },
            populateForm(data){
                var vm = this;
                    _.each(this.fields, function(field){
                        vm.record[field.key] = data[field.key];
                    });
            },
            clearForm(){
                var vm = this;
                    _.each(this.fields, function(field){
                        vm.record[field.key] = '';
                    });
            }
        },
        mounted(){
            this.fetchInitialRecord();
        }
	}
</script>