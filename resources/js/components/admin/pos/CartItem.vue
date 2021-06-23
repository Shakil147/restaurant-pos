<template>
	<div>
    <td class="text-center">
      <button type="button" class="btn btn-info btn-sm">
        Edit
      </button>{{ item.name }}
    </td>
    <td class="text-center">{{ parseFloat(item.price).toFixed(2) }}</td>
    <td class="text-center">
     
    </td>
    <td class="text-center">0</td>
    <td class="text-center">
      {{ parseFloat(item.price * item.quantity).toFixed(2) }} 
      <button type="button" class="btn btn-danger btn-sm" @click="removeItem(item.id)">
        <i class="fa fa-times" aria-hidden="true"></i>
      </button>
    </td> 
  </div>
</template>

<script>
    export default {
      components:{

        },
        data: function () {
            return {
                loading: true,
                file: '',
                message: '',
                errors: {},
            }
        },
        props: ['item'],
        mounted() {

        },
        methods: {
            addToCart: function(){
            	//alert('dsad')

            	let data = new FormData;
	            data.append('product_id', this.product.id);

            	axios.post('/admin/cart/store',data)
                .then((response) => {
                    console.log(response.data);
                   this.message = response.data.message;
                   this.status = response.data.status;

                    if (this.status == 'success') {
                    	this.$eventBus.$emit('cart-upated');
                        this.errors = {};
                    	this.$toaster.success(this.message);
                    }else{
                    	console.log(response.data);
                        this.$swal({
						  title: 'Error!',
						  text: this.status,
						  icon: 'error',
						});
                    }       
                    
                })
                .catch(error => {
                	if (error.response) {
                		console.log(error.response.data.errors)
	                    console.log(error.response.data.message)
	                    this.errors = error.response.data.errors;
	                    this.$swal({
                          title: 'error!',
                          text: error.response.data.message,
                          icon: 'error',
                          //confirmButtonText: 'Cool'
                        });
                	}                    
                   
                 });
            },
        }
    }
</script>