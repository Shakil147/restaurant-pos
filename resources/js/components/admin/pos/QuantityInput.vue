<template>
    <div>
        <span class="qty-control">
            <span class="dn" @click="minus">-</span>
            <input type="number" v-model="item.quantity" min="0" max="100"/>
            <span class="up" @click="plus">+</span>
        </span>
    </div>
</template>

<script>
    export default {
      components:{

        },
        data: function () {
            return {
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
              this.note = this.item.attributes['note'];
            }
        },
        mounted() {
          this.discount = this.item.attributes['discount'];
          this.note = this.item.attributes['note'];
        },
        methods: {
            minus: function(){
                if (this.item.quantity>1) {
                    this.item.quantity = this.item.quantity -1;
                    this.updateCartitem();
                    return this.item.quantity;
                }                
            },
            plus: function(){
                this.item.quantity = this.item.quantity +1;
                this.updateCartitem();
                return this.item.quantity;
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
    .qty-control {
    width: 128px;
    border: 1px solid #aaa;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    min-height: 35px;
    position: relative;
}
*, ::after, ::before {
    box-sizing: border-box;
}
.qty-control span.dn {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    -webkit-border-top-left-radius: 8px;
    -webkit-border-bottom-left-radius: 8px;
    -moz-border-top-left-radius: 8px;
    -moz-border-bottom-left-radius: 8px;
}

.qty-control input {
    border-right: 1px solid #aaa;
    border-left: 1px solid #aaa;
    width: 100% !important;
    text-align: center;
    font-size: 14px;
    border-top: 0;
    border-bottom: 0;
    font-family: myriadProBoldCond;
    background: #fff;
    color: #666;
    font-weight: bold;
}
button, input {
    overflow: visible;
}

.qty-control span {
    border: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: 700;
    cursor: pointer;
    color: #666;
    margin-top: -3px;
    line-height: 24px;
}
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