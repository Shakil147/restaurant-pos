<template>
  <p v-if="role !=null" class="text-dark text-uppercase"><i>Role : {{ role[0] }}</i></p>
</template>
<script>
    export default {
        data() {
            return {
                role: null,
                message: null,
                status: null,
                loading: true,
            	errors: {},
            }
        },

        props:['data'],

        mounted() {
          this.getAdminRole();
        },
        methods: {

            getAdminRole() {

            	axios.get('/admin/admins/get-role/'+this.data.id,)
	            .then((response)=>{
	            	response.data 
	            	
                this.role = response.data;

	            }).catch(error => {
                        console.error(error.response.data.errors)
                       // console.error(error.response.data.message)
                       this.errors = error.response.data.errors;
                       	this.$swal({
							  title: 'error!',
							  text: error.response.data.message,
							  icon: 'error',
							});
                       
                     });
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