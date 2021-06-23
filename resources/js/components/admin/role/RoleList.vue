<template>

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <div class="row">
        <div class="col-6">
              
          <h6 class="br-section-label">Role List</h6>
          <p class="br-section-text"></p>
        </div>
        <div class="col-6">
          <a href="/admin/roles/create" class="btn btn-primary float-right">Add New</a>
        </div>
      </div>

    <div class="bd bd-gray-300 rounded table-responsive">
	<table class="table mg-b-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
			<tr v-for="(role, index) in roles" v-bind:id="'data'+role.id">
		      <th scope="row">{{ role.id }}</th>
		      <td>{{ role.name }}</td>
		      <td class="text-center">		        
                <div v-if="role.name !== 'super-admin'" class="btn-group" role="group" aria-label="First group">
                    <a  v-bind:href="'/admin/roles/edit/'+role.id"class="btn btn-secondary btn-sm">Edit</a>
                        <a href="javascript:viod()"  class="btn btn-warning btn-sm" @click.prevent="deleteData(role, index)">Delete</a>
                </div>
		      </td>
		    </tr>	
        </tbody>
    </table> 
    </div><!-- bd -->
    <pagination :data="laravelData" @pagination-change-page="loadRole"></pagination>
    </div><!-- br-section-wrapper -->
  </div>  
</template>


<script>
import pagination from 'laravel-vue-pagination'
    export default {
      components:{
            pagination
        },
        data: function () {
            return {
                laravelData: {},
                roles: {},
                loading: true,
                file: '',
                message: '',
                errors: {},
            }
        },
        mounted() {
        	//this.sliders = this.cats;
            this.loadRole();
        },
        methods: {
            loadRole: function (page) {
                if (typeof page === 'undefined') {
                    var page = 1;
                }
      
                axios.get('/admin/roles/get-roles?page=' + page)
                    .then((response) => {
                        console.log(response.data.data)
                        this.laravelData = response.data;
                        this.roles = response.data.data;
                        this.errors = {};
                    })
                    .catch(error => {
                    console.error(error.response.data.errors)
                    console.error(error.response.data.message)
                    this.errors = error.response.data.errors;
                    this.$swal({
                          title: 'error!',
                          text: error.response.data.message,
                          icon: 'error',
                          //confirmButtonText: 'Cool'
                        });
                   
                 });
            },
            deleteCat: function (role, index) {
                axios.post('/admin/roles/destroy/'+role.id)
                .then((response) => {
                    console.log(response.data);
                  
                  if (response.data.status == 'success') {
                        document.getElementById('data'+role.id).style.display = "none";
                        this.$swal({
                          title: 'Success!',
                          text: response.data.message,
                          icon: 'success',
                          //confirmButtonText: 'Cool'
                        });
                        this.errors = {};
                    }else{
                        console.log(response.data);
                        this.$swal({
                          title: 'Error!',
                          text: response.data,
                          icon: 'error',
                        });
                    }
                    
                })
                .catch(error => {
                    console.error(error.response.data.errors)
                    console.error(error.response.data.message)
                    this.errors = error.response.data.errors;
                    this.$swal({
                          title: 'error!',
                          text: error.response.data.message,
                          icon: 'error',
                          //confirmButtonText: 'Cool'
                        });
                   
                 });
            },
            deleteData: function (role, index) {
               
               this.$swal({
                    title: 'Are you sure you want to delete '+role.name+'?',
                    text: "If you delete this, it will be gone forever.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                })
                .then((result) => {
                  if (result.value) {
                    if (result.isConfirmed){
                      this.deleteCat(role, index);
                    }
                  }

                });
            },
        }
    }
</script>