<template>
  <div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
            
        <h6 class="br-section-label">Orders List</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
        <a :href="'/admin/pos'" class="btn btn-primary float-right">POS</a>
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
      <div class="col-sm-8">
            <div class="form-group">
                <input type="text" v-model.lazy="quarry.name" name="name" class="form-control" placeholder="Customer Name Or Order Id">
            </div>
      </div>
      <div class="col-sm-2">
            <div class="form-group">
                <button type="button" class="btn btn-outline-success btn-block" @click="loadOrders()">Search</button>
            </div>
      </div>
    </div>

          <div  class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="text-center">Sl</th>
                  <th class="text-center">ID</th>
                  <th class="text-center">Name</th>
                  <!-- <th class="text-center">Item</th> -->
                 <!--  <th class="text-center">Total</th> -->
                  <th class="text-center">Grand Total</th>
                  <th class="text-center">Date</th>
                  <!-- <th class="text-center">Status</th> -->
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                
                <tr v-for="(order , index) in orders">
                  <th scope="row">{{ ((laravelData.current_page-1)*laravelData.per_page) + index +1 }}</th>
                  <th >{{ order.order_code }}</th>
                  <th class="text-center">{{ order.name }}</th>
                  <!-- <th class="text-center">{{ order.items_count }}</th> -->
                  <!-- <th class="text-center">{{ order.total }}</th> -->
                  <th class="text-center">{{ order.grand_total }}</th>
                  <th class="text-center">{{ order.created_at | moment("d-MMMM-YYYY") }}</th>
                  <!-- <th class="text-center">
                    <button v-if="order.payment_status ==1" type="button" class="btn btn-success btn-sm">Paid</button>
                    <button v-else type="button" class="btn btn-warning btn-sm"></button>
                  </th> -->
                  <td class="text-center">
                    <a :href="'/admin/orders/show/'+order.id"  class="btn btn-outline-secondary btn-sm ml-2">View</a>
                    <!-- <a href="javascript:viod()"  class="btn btn-outline-danger btn-sm ml-2">Delete</a> -->
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- bd -->
    <pagination :data="laravelData" @pagination-change-page="loadOrders"></pagination>
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
          'start_date':'',
          'end_date':'',
          'name':'',
        },
        laravelData: {},
        orders: {},
        loading: true,
        file: '',
        message: '',
        errors: {},
      }
    },
    mounted() {
      this.loadOrders();
    },
    created() {
     
    },
    beforeDestroy() {
        
    },
    watch: {
        quarry: {
            handler: function () {
                this.loadOrders();
            },
            deep: true
        }
    },
    methods:{
      
    loadOrders: function(page = 1){
       axios.get('/admin/orders/get?page=' + page,{
                        params: this.quarry
            }).then((response) => {
          this.laravelData = response.data;
          this.orders = response.data.data;
        });
    },
  }
}
</script>
