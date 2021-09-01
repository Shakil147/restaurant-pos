<template>
  <div class="col-md-6 m-0 p-0">
    <div class="row mt-3 ml-3">
      <div class="col-sm-5 m-0">
        <label class="form-control-label">Name: </label>
        <input class="form-control" type="text" name="name" value="" placeholder="Name" required v-model="name">

        <span class="invalid-feedback" role="alert">
          <strong></strong>
        </span>

      </div>

      <div class="col-sm-3">
        <label class="form-control-label">Table: </label>
        <input class="form-control" type="text" name="name" value="" placeholder="Table No" required v-model="table">

        <span class="invalid-feedback" role="alert">
          <strong></strong>
        </span>
      </div>
      <div class="col-sm-3">
        <label class="form-control-label">K.O.T: </label>
        <input class="form-control" type="text" name="kot" value="" placeholder="K.O.T" required v-model="kot">

        <span class="invalid-feedback" role="alert">
          <strong></strong>
        </span>
      </div>
      <!-- <div class="col-sm-5">
        <button type="button" @click="save('save')" class="btn btn-outline-info btn-sm " style="margin-top: 40px;"><i class="fa fa-floppy" aria-hidden="true"></i> Save</button>
        <button type="button" @click="save('s&p')" class="btn btn-outline-primary btn-sm" style="margin-top: 40px;" ><i class="fa fa-print"></i>Save And Print</button>
      </div> -->

    </div>

    <div class="item-boxes">
      <div class="form-group m-3">
        <table id="" class="table display responsive nowrap">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">Item</th>
              <th class="text-center">Price</th>
              <th class="text-center">Qty</th>
              <th class="text-center">Discount</th>
              <th class="text-center">Sub Total</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item , index) in items">
              <td class="text-center">  {{ item.name }}
              </td>
              <td class="text-center">{{ parseFloat(item.price).toFixed(2) }}</td>
              <td class="text-center">
                <quantity-input :item="item"></quantity-input>
              </td>
              <td class="text-center">{{ item.attributes['discount'] }}</td>
              <td class="text-center">
                {{ parseFloat(item.attributes['subtotal']).toFixed(2) }}

              </td>
              <td>
                <div class="btn-group" role="group" aria-label="First group">
                  <button type="button" class="btn btn-info btn-sm" @click="editModel(item)">
                    Edit
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" @click="removeItem(item)">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </button>
                </div>

              </td>
            </tr>
          </tbody>
        </table>
      </div><!-- col-12 -->

    </div>
    <div class="form-group" >
      <table id="" class="table display responsive nowrap">
        <tbody>

          <tr class="table-warning">
            <td class="text-center text-dark"><b>Total Item: {{ order.total_item }}</b></td>
            <td class="text-center text-dark"><b>Sub Total: {{ order.total }}</b></td>
            <td class="text-center text-dark"><b>Discount: {{ order.discount }}</b></td>
          </tr>
          <tr class="table-dark">
            <td class="text-center  text-dark" >
              <h4><b>Change : {{ Number(order.change).toFixed(2) }}</b></h4>
            </td>
            <td class="text-center  text-dark" >
              <h4><b>Collected : {{ Number(order.collected).toFixed(2) }}</b></h4>
            </td>
            <td class="text-center  text-dark" >
              <h4><b>Grand Total : {{ Number(order.grand_total).toFixed(2) }}</b></h4>
            </td>
          <tr class="table-dark">
            <td class="text-center  text-dark " >
              <button class="btn btn-sm btn-primary btn-block" @click.prevent="billingModel()"><i class="far fa-money-bill-alt"></i> Billing</button>
            </td>
            <td class="text-center  text-dark" >
              <button class="btn btn-sm btn-secondary btn-block" @click.prevent="save('s&p')"><i class="fa fa-print"></i> Print</button>
            </td>
            <td class="text-center  text-dark" >
              <button class="btn btn-sm btn-danger btn-block" @click.prevent="clear()"><i class="fas fa-times"></i> Clear</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div><!-- col-12 -->

<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <edit-cart-item v-if="edititem!==null" :item="edititem"></edit-cart-item>

</div>

<div class="modal fade" id="edit-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <edit-payment :order="order"></edit-payment>

</div>

</div>
</template>

<script>
  import EditPayment from './EditPayment.vue';
  import QuantityInput from './QuantityInput.vue';
  import EditCartItem from './EditCartItem.vue';
  export default {
    components:{
      'quantity-input':QuantityInput,
      'edit-cart-item':EditCartItem,
      'edit-payment':EditPayment,
    },
    data: function () {
      return {
        edititem: {},
        name: '',
        table: '',
        kot: '',
        items: {},
        order:{          
          "total_item": 0,
          "total": 0,
          "discount": 0,
          "grand_total": 0,
          "collected": 0,
          "change": 0,
          "note": 0,
        },
        loading: true,
        file: '',
        message: '',
        errors: {},
      }
    },
    mounted() {
      this.loadCart();
      console.log('Component mounted.')
    },
    created() {
      this.$eventBus.$on('cart-upated', this.loadCart);
      this.$eventBus.$on('model-close', this.closeModel);
      this.$eventBus.$on('payment-saved', this.closePaymentModel);
    },
    beforeDestroy() {
      this.$eventBus.$off('cart-upated');
      this.$eventBus.$off('model-close');
      this.$eventBus.$off('payment-saved', this.closePaymentModel);
    },
    methods:{
      loadCart: function(){
       axios.get('/admin/pos/get')
       .then((response) => {
        this.items = response.data.items;
        this.order = response.data;
      });
       
    },
    removeItem: function(item){
        let data = new FormData;
            data.append('id', item.id);

        axios.post('/admin/cart/destroy',data)
        .then((response) => {
            console.log(response.data);
            this.message = response.data.message;
            this.status = response.data.status;

            if (this.status == 'success') {
            this.loadCart()
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
    save: function(type){

      let data = new FormData;
      data.append('name', this.name);
      data.append('table', this.table);
      data.append('kot', this.kot);
      data.append('type',type);

      axios.post('/admin/pos/store',data)
      .then((response) => {
        console.log(response.data);
        this.message = response.data.message;
        this.status = response.data.status;
        this.errors = {};

          if (this.status == 'success') {
            this.edititem = {},
            this.name = '',
            this.table = '',
            this.kot = '',
            this.items = {},
            this.order = {
              "total_item": 0,
              "total": 0,
              "discount": 0,
              "grand_total": 0,
              "collected": 0,
              "change": 0,
              "note": 0,
            };
          if (response.data.print) {
            var url = '/admin/pos/print/'+response.data.print;
            window.open(url,'name','width=20')
            console.log('print'+response.data.print)
          }else{
            console.log('no print')
          }

          
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
    clear: function(){
       axios.post('/admin/pos/clear')
      .then((response) => {
        this.edititem = {},
        this.name = '',
        this.table = '',
        this.kot = '',
        this.items = {},
        this.order = {
          "total_item": 0,
          "total": 0,
          "discount": 0,
          "grand_total": 0,
          "collected": 0,
          "change": 0,
          "note": 0,
        };
        if (this.response.status == 200) {
          this.clearAll();
          this.$swal({
            title: 'Success!',
            text: 'All Cleard',
            icon: 'success',
          });
        }
      })
    },
    billingModel: function(){
       $('#edit-payment').modal('show');
    },
    editModel: function(item){
       $('#edit-item').modal('show');
      return this.edititem = item;
    },
     updateQuantity: function(item){
      console.log(item);
    },
    closeModel: function(){
       $('#edit-item').modal('hide');
    },
    closePaymentModel: function(){
       $('#edit-payment').modal('hide');
    },
  }
}
</script>

<style>
.modal-md .form-group {
    margin-bottom: 1rem;
}
</style>
