<template>

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <div class="row">
        <div class="col-6">
              
          <h6 class="br-section-label">Slider List</h6>
          <p class="br-section-text"></p>
        </div>
        <div class="col-6">
          <a href="/admin/admins/create" class="btn btn-primary float-right">Add New</a>
        </div>
      </div>

    <div class="bd bd-gray-300 rounded table-responsive">
	<table class="table mg-b-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Status</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
			<tr v-for="(admin, index) in admins" v-bind:id="'data'+admin.id">
		      <th scope="row">{{ admin.id }}</th>
		      <th >
                <p v-if="admin.image" ><img :src="admin.image" alt="" width="40px" class="rounded img-thumbnail"></p>
                <p v-else> <img :src="'/uploads/blank.png'" alt="" width="40px" class="rounded img-thumbnail"></p>
              </th>
		      <td>
                {{ admin.name }}<adminrole :data="admin"></adminrole></td>
		      <td > <span v-if="admin.status ==1" class="text-success">Active</span> <span v-if="admin.status !=1" class="text-warning">Deactiv</span></td>
		      <td class="text-center">
		        <a  v-bind:href="'/admin/admins/edit/'+admin.id" class="ml-2">Edit</a>
		        <a href="javascript:viod()" class="ml-2" @click.prevent="deleteData(admin, index)">Delete</a>
		      </td>
		    </tr>	
        </tbody>
    </table> 
    </div><!-- bd -->
    <pagination :data="laravelData" @pagination-change-page="loadAdmins"></pagination>
    </div><!-- br-section-wrapper -->
  </div>  
</template>


<script>
import pagination from 'laravel-vue-pagination'
import adminrole from './AdminRole.vue'
    export default {
      components:{
            'pagination':pagination,
            'adminrole':adminrole,
        },
        data: function () {
            return {
                laravelData: {},
                admins: {},
                loading: true,
                file: '',
                message: '',
                errors: {},
            }
        },
        mounted() {
        	//this.sliders = this.cats;
            this.loadAdmins();
        },
        methods: {
            loadAdmins: function (page) {
                if (typeof page === 'undefined') {
                    var page = 1;
                }
      
                axios.get('/admin/admins/get-admins?page=' + page)
                    .then((response) => {
                        console.log(response.data.data)
                        this.laravelData = response.data;
                        this.admins = response.data.data;
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
            deleteCat: function (slider, index) {
                axios.post('/admin/admins/destroy/'+slider.id)
                .then((response) => {
                    console.log(response.data);
                  
                  if (response.data.status == 'success') {
                        document.getElementById('data'+slider.id).style.display = "none";
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
            deleteData: function (slider, index) {
               
               this.$swal({
                    title: 'Are you sure you want to delete '+slider.name+'?',
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
                      this.deleteCat(slider, index);
                    }
                  }

                });
            },
        }
    }
</script>