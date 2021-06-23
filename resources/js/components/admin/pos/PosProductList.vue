<template>
    <div class="col-md-6 m-0 p-0">
        <div class="row m-0 p-0">
          <div class="col-md-5 m-0 p-0">
            <label class="text-info">Category</label>
            <select name="category_id" id="category_id" required class="form-control" v-model="selected.category_id">
              <option value="all">All</option>
              <option  v-for="(category, index) in categories" :value="category.id">{{ category.name }}</option>             
            </select>           
            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>
          </div>
          <div class="col-md-5 m-0 p-0">
            <label  class="text-info">Search Product</label>
            <input class="form-control" type="text" name="name" value="" placeholder="Enter Product Name" v-model.lazy="selected.name" required>
            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>
          </div>     
          <div class="col-md-2 m-0 p-0">
            <button @click="getproducts" type="submit" class="btn btn-success btn-md" style="margin-top: 28px;">Search</button>      
          </div>          
        </div>

        <div class="card-boxes">
          <div class="row" style="margin:0!important">

            <div class="col-sm-4 col-xs-4 " v-for="(product, index) in products">

              <product-card :product="product"></product-card>

            </div>


          </div>
        </div>
      </div>
</template>

<script>
  import ProductCard from './ProductCard.vue';
    export default {
      components:{
        'product-card':ProductCard
        },
        data: function () {
            return {
                categories: {},
                products: {},
                selected: {
                    category_id: 'all',
                    name: null,
                },
                loading: true,
                file: '',
                message: '',
                errors: {},
            }
        },
        mounted() {
            //alert(this.name);
            this.loagCategories();
            this.getproducts();
        },
        watch: {
            selected: {
                handler: function () {
                    this.getproducts();
                },
                deep: true
            }
        },
        methods: {
            getproducts: function(){
              
              axios.get('/admin/pos/search-product',{
                        params: this.selected
                    }).then((response) => {
                        //console.log(response.data)
                        this.products = response.data;
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
            loagCategories: function () {
               
                axios.get('/admin/categories/get')
                    .then((response) => {
                       // console.log(response.data)
                        this.categories = response.data;
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
            deleteProduct: function (product, index) {
                axios.post('/admin/products/destroy/'+product.id)
                .then((response) => {
                    //console.log(response.data);
                  
                  if (response.data.status == 'success') {
                        document.getElementById('data'+product.id).style.display = "none";
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
            deleteData: function (product, index) {
               
               this.$swal({
                    title: 'Are you sure you want to delete '+product.name+'?',
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
                      this.deleteProduct(product, index);
                    }
                  }

                });
            },
            changeStatus: function (review, index) {
               
               this.$swal({
                    title: 'Are you sure you want to Change Status',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Change it!',
                    cancelButtonText: 'cancel!',
                    reverseButtons: true
                })
                .then((result) => {
                  if (result.value) {
                    if (result.isConfirmed){
                      this.statusChange(review, index);
                    }
                  }

                });
            },

            statusChange: function (review, index) {
                axios.post('/admin/reviews/change-status/'+review.id)
                .then((response) => {
                    //console.log(response.data);
                  
                  if (response.data.status == 'success') {
                      this.loadReviews();
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
