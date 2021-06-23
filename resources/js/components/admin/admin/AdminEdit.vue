<template>
	<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
            
        <h6 class="br-section-label">Admin Edit</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
       <a :href="'/admin/admins'" class="btn btn-primary float-right">Admin List</a>
      </div>
    </div>
    <form  @submit.prevent="addEdit" :action="'/admin/admins/update/'+data.id" method="POST" enctype="multipart/form-data">

  <input type="hidden" name="_token" value="3ZwItNq9IPy9R6MioMklZeoO7AcW46qGEWydr7Iv">
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="name"  placeholder="Enter Name" v-model="admin.name" required>
                <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
              </div>
            </div><!-- col-4 -->
        
            
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                <input class="form-control" type="email" name="email" v-model="admin.email"  placeholder="Enter Email" required>
                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
              </div>
            </div><!-- col-12 -->

	        <div class="col-lg-4 col-sm-12  ml-1 row mb-3">
	          <div class="custom-file col-12">
	                <input type="file" name="image" @change="imageSelected" class="custom-file-input" id="customFile2">
	                <label class="custom-file-label" for="customFile2">Choose an image</label>
	                <span class="text-danger" v-if="errors.image">{{ errors.image[0] }}</span>
	            </div>
	            <div v-if="imagepreview" class="mt-3 col-12">
	                <img :src="imagepreview" class="figure-img img-fluid rounded" width="100px">
	            </div>
	        </div>

            <div class="col-12"></div>
            <div class="col-md-6 col-sm-12 mt-3">
              <div class="form-group">
                  <label class="text-capitalize"> Select Role : </label>
                  <select name="role" id="role" class="form-control" :disabled="inArray( 'super-admin',admin_roles)" @change="roleSelected">
                    <option value="">Select Role</option>
                    <option  v-for="(role, index) in roles" :selected="inArray( role.name,admin_roles)" :value="role.name">{{ role.name}}</option>
                  </select>         
              </div>
            </div>

	        <div class="col-12"></div>
	        <div class="col-lg-6 col-sm-12">
	          <div class="form-group">
	            <label class="form-control-label">Status: </label>
	                <span class="text-danger" v-if="errors.status">{{ errors.status[0] }}</span>
	            <input  type="checkbox" checked name="status" v-model="admin.status" value="1">
	          </div>
	        </div><!-- col-4 -->        
	    </div>
        
        
      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit" :disabled="inArray( 'super-admin',admin_roles)">Save</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
  </div>
</div><!-- br-pagebody -->
</template>
<script>
    export default {
        data() {
            return {
                admin: {},
                admin_role: null,
                message: null,
                status: null,
                loading: true, 
                image: null,
            	imagepreview: null,
                icon: null,
            	iconpreview: null,
            	errors: {},
            }
        },

        props:['data','roles','admin_roles'],

        mounted() {
        	
        	this.admin = this.data;       	
        	this.imagepreview = this.admin.image;

          var lastPosition = this.admin_roles.length -1;

         
          this.admin_role = this.admin_roles;
        },
        methods: {

            addEdit() {
            	 let data = new FormData;
	            data.append('image', this.image);
	            data.append('name', this.admin.name);
	            data.append('email', this.admin.email);
	            data.append('status', this.admin.status);
              data.append('admin_role', this.admin_role);

            	axios.post('/admin/admins/update/'+this.data.id, data)
	            .then((response)=>{
	            	
	            	
                    if (response.data.status == 'success') {
                    	this.admin = response.data.data;
    		            	this.imagepreview = this.admin.image;
	                    this.message = response.data.message;
	                    this.status = response.data.status;
	                    this.errors = {};
	                    this.$swal({
        							  title: 'Success!',
        							  text: this.message,
        							  icon: 'success',
        							});
                    }else{
                    	console.log(response.data);
                            this.$swal({
							  title: 'Error!',
							  text: response.data,
							  icon: 'error',
							});
                        }
	            }).catch(error => {
                        console.error(error.response.data.errors)
                       // console.error(error.response.data.message)
                       this.errors = error.response.data.errors;
                       	this.$swal({
							  title: 'error!',
							  text: error.response.data.message,
							  icon: 'error',
							  //confirmButtonText: 'Cool'
							});
                       
                     });
            },
            imageSelected(e){
	            this.image = e.target.files[0];
	            let reader = new FileReader();
	            reader.readAsDataURL(this.image);
	            reader.onload = e => {
	            this.imagepreview = e.target.result;
	               };
	        },
          roleSelected(e){
            return  this.admin_role  = event.target.value;
          },
         inArray: function(needle, haystack) {
                var length = haystack.length;
                for(var i = 0; i < length; i++) {
                    if(haystack[i] == needle) return true;
                }
                return false;
            }
        }
    }
</script>