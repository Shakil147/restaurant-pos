<template>
  <div class="col-md-6 m-0 p-0">
    <div class="row mt-3 ml-3">
      <div class="col-sm-7 m-0">
        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
        <input class="form-control" type="text" name="name" value="" placeholder="Enter Name" required v-model="name">  

        <span class="invalid-feedback" role="alert">
          <strong></strong>
        </span>

      </div>

      <div class="col-sm-5">
        <button type="button" @click="save('save')" class="btn btn-outline-info btn-sm " style="margin-top: 40px;"><i class="fa fa-floppy" aria-hidden="true"></i> Save</button>
        <button type="button" @click="save('s&p')" class="btn btn-outline-primary btn-sm" style="margin-top: 40px;" ><i class="fa fa-print"></i>Save And Print</button>
      </div>

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
          <!-- <tr class="table-warning">
            <td class="text-center text-dark"><b>Vat & Tax: 0.000</b></td>
            <td class="text-center text-dark"></td>
            <td class="text-center text-dark"><b>Charge:0.000</b></td>
          </tr> -->
          <tr class="table-dark">
            <td class="text-center  text-dark" colspan="3">
              <h3><b>Total Payable : {{ order.grand_total }}</b></h3>
            </td>
          </tr>
        </tbody>
      </table>
    </div><!-- col-12 -->

<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <edit-cart-item :item="edititem"></edit-cart-item>

</div>

  </div>
</template>

<script>
  import QuantityInput from './QuantityInput.vue';
  import EditCartItem from './EditCartItem.vue';
  export default {
    components:{
      'quantity-input':QuantityInput,
      'edit-cart-item':EditCartItem,
    },
    data: function () {
      return {
        name: null,
        edititem: {},
        items: {},
        order:{
          "total_item": 0,
          "total": 0,
          "discount": 0,
          "grand_total": 0
        },
        customer_name: {},
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
    },
    beforeDestroy() {
      this.$eventBus.$off('cart-upated');
      this.$eventBus.$off('model-close');      
    },
    methods:{
      loadCart: function(){
       axios.get('/admin/cart/get')
       .then((response) => {
                  //  console.log(response.data)
                  this.items = response.data;
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
       this.loadOrder();
    },
    loadOrder: function(){
       axios.get('/admin/pos/get')
       .then((response) => {
                  //  console.log(response.data)
                  this.order = response.data;
                })
       .catch(error => {
        console.error(error.response.data.errors)
        console.error(error.response.data.message)
        this.errors = error.response.data.errors;
        this.$swal({
          title: 'error!',
          text: error.response.data.message,
          icon: 'error',
       });

      });
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
    removeItem: function(item){

      this.$swal({
        title: 'Are you sure you want to Remove '+item.name+'?',
        showCancelButton: true,
        confirmButtonText: 'Yes, Remove it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
      })
      .then((result) => {
        if (result.value) {
          if (result.isConfirmed){
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
          }
        }

      });
    },
    save: function(type){

      let data = new FormData;
      data.append('name', this.name);
      data.append('type',type);

      axios.post('/admin/pos/store',data)
      .then((response) => {
        console.log(response.data);
        this.message = response.data.message;
        this.status = response.data.status;

        if (this.status == 'success') {

          if (response.data.print) {
            var url = '/admin/pos/print/'+response.data.print;
            window.open(url,'name','width=20')
            console.log('print'+response.data.print)
          }else{
            console.log('no print')
          }

          this.name = null;
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
    }
  }
}
</script>
