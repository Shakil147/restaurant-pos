/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

Vue.prototype.$eventBus = new Vue(); 

Vue.use(require('vue-resource'));

import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000});
Vue.use(require('vue-moment'));
//window.location.origin
Vue.component('pagination', require('laravel-vue-pagination').default);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cart-list', require('./components/admin/pos/CartList.vue').default);
Vue.component('pos-product-list', require('./components/admin/pos/PosProductList.vue').default);

Vue.component('orders-list', require('./components/admin/order/OrderList.vue').default);
Vue.component('orders-view', require('./components/admin/order/OrderView.vue').default);
Vue.component('products-list', require('./components/admin/product/ProductList.vue').default);

// Vue.component('stock-view', require('./components/admin/order/OrderView.vue').default);
// Vue.component('stock-list', require('./components/admin/product/ProductList.vue').default);
Vue.component('stock-in', require('./components/admin/stock/StockIn.vue').default);
//role component
Vue.component('admin-role-list', require('./components/admin/role/RoleList.vue').default);


//admin component
Vue.component('admin-admin-list', require('./components/admin/admin/AdminList.vue').default);
Vue.component('admin-admin-add', require('./components/admin/admin/AdminAdd.vue').default);
Vue.component('admin-admin-edit', require('./components/admin/admin/AdminEdit.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
