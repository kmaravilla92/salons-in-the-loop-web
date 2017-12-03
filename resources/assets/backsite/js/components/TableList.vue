<template>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Users
                        <i class="material-icons">people</i>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">print</i>
                                        Print
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">file_download</i>
                                        Export CSV
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" @click="refreshList">
                                        <i class="material-icons">refresh</i>
                                        Refresh
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red" checked/>
                                    </th>
                                    <th v-for="header in headers" :key="header.key">{{header.title}}</th>
                                    <th>
                                        <td>Actions</td>
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-red" checked />
                                    </th>
                                    <th v-for="header in headers" :key="header.key">{{header.title}}</th>
                                    <th>
                                        <td>Actions</td>
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr v-for="record in records" :key="record.id">
                                    <td>
                                        <input type="checkbox" :id="'md_checkbox_'+record.id" class="filled-in chk-col-red" checked />
                                        <label :for="'md_checkbox_'+record.id">RED</label>
                                    </td>
                                    <td v-for="header in headers" :key="record.id">{{record[header.key]}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                DEFAULT <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="material-icons">edit</i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="material-icons">pageview</i>
                                                        View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="material-icons">delete</i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props: ['headers', 'records'],
        methods: {
            refreshList(){
                this.$parent.fetchList();
            }
        }
	}
</script>