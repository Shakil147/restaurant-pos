<template>
  <div class="br-pagebody">
    <div class="br-section-wrapper">
      <div class="row">
        <div class="col-6">
          <h6 class="br-section-label text-capitalize">Stock In</h6>
          <p class="br-section-text"></p>
        </div>
        <div class="col-6">
          <a href="/admin/stocks/" class="btn btn-primary float-right text-capitalize">Stock List</a>
        </div>
      </div>
      <stock-add-form></stock-add-form>
      <form action="admin.purchases.store" method="POST" enctype="multipart/form-data">
        <div class="form-layout form-layout-1">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-2">
                  <div class="form-group ">
                    <label class="form-control-label text-center">Item</label>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="form-control-label text-center">Price</label>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="form-control-label text-center">Quantity</label>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label class="form-control-label text-center">Discount</label>
                  </div>
                </div>  
                <div class="col-2">
                  <div class="form-group">
                    <label class="form-control-label text-center">Total</label>
                  </div>
                </div>
                <div class="col-2">
                  <label class="form-control-label text-center">Action</label>
                </div>
              </div>
            </div>
            <div class="col-12" v-for="(product,index) in products" v-if="ObjectLength(products)>0">
              <row-item :product="product"></row-item>
            </div>
          </div>
        </div>
        <div class="form-layout-footer">
          <button class="btn btn-secondary" type="reset">Reset</button>
          <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save and Continue</button>
          <button class="btn btn-info" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
</template>
<script>

  import StockAddForm from './StockAddForm.vue'
  import RowItem from './RowItem.vue'
  export default{
    components:{
      'stock-add-form':StockAddForm,
      'row-item':RowItem
    },
    data: function(){
      return {        
        products: {},
      }
    },
    mounted(){
    },
    created() {
      this.$eventBus.$on('item-added', (data)=>{
        if (data.id) {
          this.$set(this.products, data.id, data)  
        }        
      });
    },
    methods:{
      save: function(){
        axios.post(window.location.origin+'/admin/').then((response)=>{

        })
      },
      remodeItem: function(data){
        this.products.splice(data.id);
      },
      ObjectLength: function (object ) {
        var length = 0;
        for( var key in object ) {
          if( object.hasOwnProperty(key) ) {
            ++length;
          }
        }
        return length;
      },
    }
  }
</script>