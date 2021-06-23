<template>	
	<div class="br-pagebody">
		<div class="br-section-wrapper">
			<div class="row">
				<div class="col-6">

					<h6 class="br-section-label">Products List</h6>
					<p class="br-section-text"></p>
				</div>
				<div class="col-6">
					<a href="/admin/products/create" class="btn btn-primary float-right">Add New</a>
				</div>
			</div>			
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<select  v-model="quarry.perpage" name="per_page" id="per-page" class="form-control">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
							<option value="500">500</option>
							<option value="all">All</option>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
			            <select name="category_id" id="category_id" required class="form-control" v-model="quarry.category_id">
			              <option value="all">All</option>
			              <option  v-for="(category, index) in categories" :value="category.id">{{ category.name }}</option>             
			            </select>           
			            <span class="invalid-feedback" role="alert">
			                <strong></strong>
			            </span>
						</div>
					</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" v-model.lazy="quarry.name" name="name" class="form-control" placeholder="Product Name">
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<button type="button" class="btn btn-outline-success btn-block" @click="loadProducts()">Search</button>
					</div>
				</div>
			</div>
			<div  class="table-wrapper">
				<table id="datatable1" class="table display responsive nowrap">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th >Image</th>
							<th >Name</th>
							<th >Category</th>
							<th class="text-center">Date</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(product , index) in products" :id="'data'+product.id">
							<th scope="row">{{ ((laravelData.current_page-1)*laravelData.per_page) + index +1 }}</th>
							<th ><img :src="product.image ? product.image : '/uploads/blank.png' " width="40" alt="" class="img-thumbnail"> </th>
							<th >
								{{ product.name }}<br>
								<span v-if="product.status ==1" class=" text-success">Active</span>
                    			<span v-else  class=" text-warning">Dactive</span>
							</th>
							<th >
								<span v-for="(cat , i) in product.categories">{{ i!=0? ',':null }} {{ cat.name }}</span></th>
							<td class="text-center">{{ product.created_at | moment("d-MMMM-YYYY") }}</td>
							<td class="text-center">
								<a :href="'/admin/products/edit/'+product.id"  class="btn btn-outline-secondary btn-sm ml-2">Edit</a>
								<a href="javascript:viod()"  class="btn btn-outline-danger btn-sm ml-2" @click="deleteData(product,index)">Delete</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- bd -->
			<pagination :data="laravelData" @pagination-change-page="loadProducts"></pagination>
		</div><!-- br-section-wrapper -->
	</div><!-- br-pagebody -->
</template>

<script>

	import pagination from 'laravel-vue-pagination';
	import Datepicker from 'vuejs-datepicker';
	export default {
		components:{
			'pagination':pagination,
			'datepicker':Datepicker,
		},
		data: function () {
			return {
				quarry: {
					'perpage':'10',
					'category_id':'all',
					'start_date':'',
					'end_date':'',
					'name':'',
				},
				laravelData: {},
				categories: {},
				products: {},
				loading: true,
				file: '',
				message: '',
				errors: {},
			}
		},
		mounted() {
			this.loadProducts();
			this.loagCategories();
		},
		created() {

		},
		beforeDestroy() {

		},
		watch: {
			quarry: {
				handler: function () {
					this.loadProducts();
				},
				deep: true
			}
		},
		methods:{

			loadProducts: function(page = 1){
				axios.get('/admin/products/get?page=' + page,{
					params: this.quarry
				}).then((response) => {
					this.laravelData = response.data;
					this.products = response.data.data;
				});
			},

            loagCategories: function () {
               
                axios.get('/admin/categories/get')
                .then((response) => {
                    this.categories = response.data;
                });
            },

            deleteData: function (product, index) {
               
               this.$swal({
                    title: 'Are you sure you want to delete '+product.name+'?',
                    text: "If you delete this, it will be gone forever.",
                   // icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                })
                .then((result) => {
                  if (result.value) {
                    if (result.isConfirmed){
                      this.deleteCat(product, index);
                    }
                  }

                });
            },

            deleteProduct: function (product, index) {
                axios.post('/admin/products/destroy/'+product.id)
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