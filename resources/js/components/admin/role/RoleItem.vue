<template>
	
			<tr >
		      <th scope="row">{{ index+1 }}</th>
		      <th ><img v:if="category.icon" :src="category.icon" alt="" width="100px" class="rounded"></th>
		      <td>{{ category.name }}</td>
		      <td > <span v-if="category.status ==1" class="text-success">Active</span> <span v-if="category.status !=1" class="text-warning">Deactiv</span></td>
		      <td class="text-center">
		        <a href="javascript:viod()" class="ml-2">View</a>
		        <a  v-bind:href="'/admin/categories/edit/'+category.id" class="ml-2">Edit</a>
		        <a href="javascript:viod()" class="ml-2" @click.prevent="deleteData(category, index)">Delete</a>
		      </td>
		    </tr>  
</template>


<script>
    export default {
        data: function () {
            return {
                categories: [],
                loading: true,
                file: '',
                message: '',
                errors: {},
            }
        },
        props:['category','index'],
        mounted() {
        	//this.categories = this.cats;
            //this.loadCategories();
        },
        methods: {
            loadCategories: function () {
                axios.get('/admin/categories')
                    .then((response) => {
                        this.categories = response.data.data;
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
            deleteData: function (category, index) {
                axios.post('/admin/categories/destroy/'+category.id)
                .then((response) => {
                    console.log(response.data);
                	
                	if (response.data.status == 'success') {
                        document.getElementById('cat'+category.id).style.display = "none";
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
        }
    }
</script>