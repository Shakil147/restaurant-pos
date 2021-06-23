<template>
	<div class="card" >
    <img :src="product.image" class="card-img-top" alt="..." @click="addToCart">
    <div class="card-body">
      <h6 class="card-title" @click="addToCart">{{ product.name }}</h6>
      <b @click="addToCart">
        Price : ৳ {{ product.price }}<br>
        Stock : <span v-if="product.stock>0" class="text-success">In Stock</span>
                <span v-else class="text-warning">Out Stock</span><br>
      </b>
    </div>
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
        props: ['product'],
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
                    	//this.$toaster.success(this.message);
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