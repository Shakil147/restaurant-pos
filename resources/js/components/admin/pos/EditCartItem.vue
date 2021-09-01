<template>
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Cart Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="recipient-name" class="col-form-label">Quantity:</label>
              </div>
              <div class="col-md-4">
                <quantity-input :item="item"></quantity-input>
              </div>
              <div class="col-md-4">
                <item-image  :item="item"></item-image>
                <h4 class="text-dark"><b>{{ item.name }}</b></h4>
                <h4 class="text-dark"><b>{{  parseFloat(item.price).toFixed(2) }}</b></h4>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row m-0 p-0">
                <div class="col-md-6">
                      <label for="recipient-name" class="col-form-label">Sub Total :</label>
                      <input type="number" class="form-control" readonly :value="item.quantity * item.price" min="0" max="100">
                  </div>
                <div class="col-md-6">
                    <label for="recipient-name" class="col-form-label">Discount : {{ discount }}<br></label>
                    <input type="text" class="form-control" v-model="discount"  min="0" max="100"/>
                </div>
                <!-- <div class="col-md-4">
                    <label for="recipient-name" class="col-form-label">  Total :</label>
                    <input type="number" v-model="subtotal" class="form-control" readonly min="0" max="100"/>
                </div> -->
              </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Note:</label>
            <textarea class="form-control" id="message-text" v-model="note"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button @click="updateItem()" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</template>

<script>
  import ItemImage from './ItemImage.vue'
  import QuantityInput from './QuantityInput.vue';
    export default {
      components:{
          'item-image':ItemImage,
          'quantity-input':QuantityInput,
        },
        data: function () {
            return {
                discount: null,
                subtotal: null,
                loading: true,
                file: '',
                message: '',
                errors: {},
            }
        },
        props: ['item'],
        watch:{
            'item'(){
              this.discount = this.item.attributes['discount'];
              this.subtotal = this.item.attributes['subtotal'];
              this.note = this.item.attributes['note'];
            }
        },
        mounted() {
          this.discount = this.item.attributes['discount'];
          this.subtotal = this.item.attributes['subtotal'];
          this.note = this.item.attributes['note'];
        },
        methods: {

          getItem:function(){
           axios.get('/admin/cart/getitem/'+this.item.id)
                .then((response) => {this.item = response.data})
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
          itemImage:function(item){
            return this.item.associatedModel.image;
          },
          updateItem: function(){
            this.updateCartitem();
            this.$eventBus.$emit('model-close');
          },

            updateCartitem: function(){
              let data = new FormData;
                data.append('id', this.item.id);
                data.append('quantity', this.item.quantity);
                data.append('price', this.item.price);
                data.append('discount', this.discount);
                data.append('note', this.note);

              axios.post('/admin/cart/update',data)
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


<style scoped>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
