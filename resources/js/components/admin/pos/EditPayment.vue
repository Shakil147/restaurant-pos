<template>
	<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Cart Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <div class="row">
                  <div class="col-sm-6">
                    <label for="message-text" class="col-form-label">Payable</label>
                    <input type="number" class="form-control" readonly v-model="order.grand_total">
                  </div>
                  <div class="col-sm-6">
                    <label for="message-text" class="col-form-label">Discount</label>
                    <input type="number" class="form-control" readonly v-model="order.discount">
                  </div>
              </div>
          </div>
          <div class="form-group">
              <div class="row">
                  <div class="col-sm-6">
                    <label for="message-text" class="col-form-label">collected</label>
                    <input type="number" class="form-control" v-model="order.collected">
                  </div>
                  <div class="col-sm-6">
                    <label for="message-text" class="col-form-label">Change</label>
                    <input type="number" class="form-control" readonly v-model="order.change">
                  </div>
              </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Note:</label>
            <textarea class="form-control" id="message-text" v-model="order.note" ></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button @click="saveBilling()" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</template>
<script>
	export default{

	    data: function () {
	      return {
	        collected: 0,
	        loading: true,
	        message: '',
	        errors: {},
	      }
	    },
        watch:{
            'order.collected'(){
              this.order.change = this.order.collected - this.order.grand_total;
              
            }
        },
	    props: ['order'],
	    mounted() {

	    },
	    methods:{
	    	saveBilling: function(){

				let data = new FormData;
				data.append('collected', this.order.collected);
				data.append('note', this.order.note);

				axios.post('/admin/pos/store-billing',data)
				.then((response) => {

					if (response.status == '200') {
						this.order = response.data;
						this.$eventBus.$emit('payment-saved');
						this.errors = {};
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

					});
				}

				});
			},
	  	},
	}
</script>