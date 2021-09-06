<template>
    <div class="form-layout form-layout-1">
      <form @submit.prevent="save()" action="/admin/stocks/store" method="POST" enctype="multipart/form-data">
        <div class="row">

          <!-- <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">Supplier</label>
              <select name="supplier_id" id="supplier_id" v-model="supplier_id" class="form-control">
                <option value="">Select Supplier</option>
                <option v-if="ObjectLength(suppliers)>0" :value="supplier.id" v-for="(supplier,index) in suppliers">{{ supplier.name }}</option>
                <option v-else>No Supplier Available</option>
              </select>
            </div>
          </div> -->

          <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">Type</label>
              <select name="type_id" id="type_id" class="form-control" v-model="type_id" @change.prevent="getItems()">
                <option value="">Select Items Type</option>
                <option v-if="ObjectLength(types)>0" :value="type.id" v-for="(type,index) in types">{{ type.name }}</option>
                <option v-else>No Type Available</option>
              </select>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">Item</label>
              <select name="item_id" id="item_id"  v-model="item_id" class="form-control" @change.prevent="getProduct()">
                <option v-if="ObjectLength(items)>0" :value="item.id" v-for="(item,index) in items">{{ item.name }}</option>
                <option v-else>No Item Available</option>
              </select>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">Price</label>
              <input type="number" class="form-control" name="price" v-model="product.price">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">Quantity</label>
              <input type="number" class="form-control" name="quantity" v-model="product.quantity">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">Discount {{ product.discount }}</label>
              <input type="number" class="form-control" name="discount" v-model="product.discount">
            </div>
          </div>  
          <div class="col-md-2">
            <div class="form-group">
              <label class="form-control-label">Total</label>
              <input type="number" class="form-control" name="total" v-model="product.total" readonly>
            </div>
          </div>          
        </div>

        <div class="form-layout-footer">
          <button class="btn btn-secondary" type="reset" @click.prevent="reset()">Reset</button>
          <button class="btn btn-info" type="submit">Add</button>
        </div>
      </form>
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

        watch: {
            product: {
                handler: function () {
                    console.log('total '+this.product.price*this.product.quantity);
        console.log('price '+this.product.price);
        console.log('quantity '+this.product.quantity);
        console.log('discount '+this.product.discount);
        this.product.total = Number(this.product.price * this.product.quantity).toFixed(3);
        console.log('total '+this.product.total);
                },
                deep: true
            }
        },
    mounted(){
      this.getTypes();
      this.getSupplier();
    },
    methods:{
      calTotal: function(){
      	console.log('total '+this.product.price*this.product.quantity);
      	console.log('price '+this.product.price);
      	console.log('quantity '+this.product.quantity);
      	console.log('discount '+this.product.discount);
        this.product.total = Number(this.product.price * this.product.quantity).toFixed(3);
      	console.log('total '+this.product.total);
        return this.product.total;
      },
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
        this.sell_item = {};
        this.supplier_id = '';
        this.item_id = '';
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
		this.$eventBus.$emit('item-added', this.product);
		return this.reset();
      },
      reset: function(){
		    this.product = {};
        this.sell_item = {};
        this.type_id = '';
        this.supplier_id = '';
        this.item_id = '';
        return true;
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