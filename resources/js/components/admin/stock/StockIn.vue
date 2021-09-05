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
  
    <div class="form-layout form-layout-1">
      <form @submint.prevent="save()" action="/admin/stocks/store" method="POST" enctype="multipart/form-data">

        <div class="row">

          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Supplier</label>
              <select name="supplier_id" id="supplier_id" v-model="supplier_id" class="form-control">
                <option value="">Select Supplier</option>
                <option v-if="ObjectLength(suppliers)>0" :value="supplier.id" v-for="(supplier,index) in suppliers">{{ supplier.name }}</option>
                <option v-else>No Supplier Available</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Type</label>
              <select name="type_id" id="type_id" class="form-control" v-model="type_id" @change.prevent="getItems()">
                <option value="">Select Items Type</option>
                <option v-if="ObjectLength(types)>0" :value="type.id" v-for="(type,index) in types">{{ type.name }}</option>
                <option v-else>No Type Available</option>
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Item</label>
              <select name="item_id" id="item_id"  v-model="item_id" class="form-control" @change.prevent="getProduct()">
                <option v-if="ObjectLength(items)>0" :value="item.id" v-for="(item,index) in items">{{ item.name }}</option>
                <option v-else>No Item Available</option>
              </select>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label">Price</label>
              <input type="number" class="form-control" name="price" v-model="product.selling_price">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label">Quantity</label>
              <input type="number" class="form-control" name="quantity" v-model="product.quantity">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label">Discount</label>
              <input type="number" class="form-control" name="discount" v-model="product.discount">
            </div>
          </div>  
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label">Total</label>
              <input type="number" class="form-control" name="total" v-model="product.total" readonly>
            </div>
          </div>          
        </div>

        <div class="form-layout-footer">
          <button class="btn btn-secondary" type="reset">Reset</button>
          <button class="btn btn-info" type="submit">Save</button>
        </div>
      </form>
    </div>

    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">

      </div>
      <form action="admin.purchases.store" method="POST" enctype="multipart/form-data">
    
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
  export default{
    compontets:{

    },
    data: function(){
      return {        
        product: {},
        sell_item: {},
        type_id: '',
        supplier_id: '',
        item_id: '',
        types: {},
        items: {},
        suppliers: {},
        loading: true,
        file: '',
        message: '',
        errors: {},
      }
    },
    mounted(){
      this.getTypes();
      this.getSupplier();
    },
    methods:{
      getTypes: function(){
        axios.get(window.location.origin+'/admin/types/get/?status=1').then((response)=>{
          return response.status == 200 ? this.types = response.data : {};
        })
      },
      getSupplier: function(){
        axios.get(window.location.origin+'/admin/suppliers/get/?status=1').then((response)=>{
          return response.status == 200 ? this.suppliers = response.data : {};
        })
      },
      getItems: function(){
        this.items = {};
        this.product = {};
        axios.get(window.location.origin+'/admin/items/get/?status=1&type_id='+this.type_id).then((response)=>{          
          return response.status == 200 ? this.items = response.data : {};
        })
      },
      getProduct: function(){
        axios.get(window.location.origin+'/admin/items/getitem/'+this.item_id).then((response)=>{
          if (response.status == 200) {
          console.log(response.data)
            this.product = response.data;
            this.product.price = response.data.selling_price;
            this.product.quantity = 1;
            this.product.total = response.data.selling_price*1;
            this.product.discount = 0;
            return this.product;          }
        })
      },
      save: function(){
        axios.post(window.location.origin+'/admin/').then((response)=>{

        })
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