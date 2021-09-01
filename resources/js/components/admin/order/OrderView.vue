<template>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <div class="row">
        <div class="col-6">
          <h6 class="br-section-label">Order Details</h6>
          <p class="br-section-text"></p>
        </div>
        <div class="col-6">
          <a href="/admin/order" class="btn btn-outline-info float-right ml-2">Order List</a>
          <a href="/admin/pos" class="btn btn-outline-info float-right ml-2">POS</a>
        </div>
      </div> 
    <div class="form-group">
      <button type="button" @click="print()" class="btn btn-outline-info btn-sm" style="margin-top: 40px;" ><i class="fa fa-print"></i>Print</button>
        <p class="mt-2">
          <b>Name: {{ data.name }}</b><br>
          <b>Date: {{ data.created_at | moment("d-MMMM-YYYY") }}</b><br>
          <b>Id: {{ data.order_code }}</b><br>
          <b>Sales Associate: {{ data.user.name }}</b><br>
        </p>
    </div>
    <div class="form-group">
      <table id="" class="table display responsive nowrap">
          <thead class="thead-dark">
            <tr>
              <th class="text-center" colspan="2">Item</th>
              <th class="text-center">Price</th>
              <th class="text-center">Qty</th>
              <th class="text-center">Discount</th>
              <th class="text-center">Sub Total</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item , index) in items">
              <td class="text-center" colspan="2">  {{ item.product_name }}
              </td>
              <td class="text-center">{{ parseFloat(item.price).toFixed(2) }}</td>
              <td class="text-center">
                {{  item.quantity }}
              </td>
              <td class="text-center">{{ item.discount }}</td>
              <td class="text-center">
                {{ parseFloat(item.price*item.quantity).toFixed(2) }} 

              </td>   
              <!-- <td>
                <div class="btn-group" role="group" aria-label="First group">
                  <button type="button" class="btn btn-info btn-sm" @click="editModel(item)">
                    Edit
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" @click="removeItem(item)">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </button>
                </div>

              </td>  -->            
            </tr>
          </tbody>
        </table>
    </div>
    <div class="form-group" >
      <table id="" class="table display responsive nowrap">
        <tbody>

          <tr class="table-warning">
            <td class="text-center text-dark"><b>Total Item: {{ data.total_item }}</b></td>
            <td class="text-center text-dark"><b>Sub Total: {{ data.total }}</b></td>
            <td class="text-center text-dark"><b>Discount: {{ data.discount }}</b></td>
          </tr>
          <tr class="table-warning">
            <td class="text-center text-dark"><b>Vat & Tax: 0.000</b></td>
            <td class="text-center text-dark"></td>
            <td class="text-center text-dark"><b>Charge:0.000</b></td>
          </tr>
          <tr class="table-dark">
            <td class="text-center  text-dark" >
              <h4><b>Change : {{ Number(data.collected)  - Number(data.grand_total) }}</b></h4>
            </td>
            <td class="text-center  text-dark" >
              <h4><b>Collected : {{ Number(data.collected) }}</b></h4>
            </td>
            <td class="text-center  text-dark" >
              <h4><b>Grand Total : {{ Number(data.grand_total).toFixed(2) }}</b></h4>
            </td>
          </tr>
        </tbody>
      </table>
    </div><!-- col-12 -->
      </div>
    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->

</template>

<script>
  export default {
    components:{
    },
    data: function () {
      return {
        items: {},
        loading: true,
        message: '',
        errors: {},
      }
    },
    props:['data'],
    mounted() {
      this.items = this.data.items;

    },
    methods:{
      print:function(){
        var url = '/admin/pos/print/'+this.data.id;
        window.open(url,'name','width=200')
       // console.log('print'+response.data.print)
      }
  }
}
</script>
