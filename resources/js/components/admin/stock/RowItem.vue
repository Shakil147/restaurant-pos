<template>
  <div class="row">
    <div class="col-2">
      <div class="form-group">
        <input type="text" readonly class="form-control" v-model="product.name">
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
        <input type="number" class="form-control" name="price" v-model="product.price">
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
        <input type="number" class="form-control" name="quantity" v-model="product.quantity">
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
        <input type="number" class="form-control" name="discount" v-model="product.discount">
      </div>
    </div>  
    <div class="col-2">
      <div class="form-group">
        <input type="number" class="form-control" name="total" v-model="product.total" readonly>
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
      	<div class="btn-group" role="group" aria-label="Basic example">
		  	<button type="button" class="btn btn-sm btn-secondary">Edit</button>
      		<button type="button" class="btn btn-sm btn-warning">Delete</button>
		</div>      	
      </div>
    </div>
  </div>
</template>

<script>

  export default{
    components:{

    },
    props: ['product'],
    data: function(){
      return {        
        item: {},
      }
    },
    mounted(){
    },
    created() {
      // this.$eventBus.$on('item-added', (data)=>{
      //   this.$set(this.products, data.id, data)
      // });
    },
    watch: {
      'product': (val, oldVal) => {
        this.product.total = Number(this.product.price*this.product.quantity).toFixed(3);
      }
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
<style>
.form-group .btn-group{
	margin: 10px 10px;	
}
</style>