require('./bootstrap');
require('es6-object-assign/auto');
require('./common');
window.Vue = require('vue');

import Header from './Components/Home/Header.vue';
import MiniAbout from './Components/Home/MiniAbout.vue';
import Promotions from './Components/Home/Promotions.vue';
import mixins from './mixins';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.mixin(mixins);
Vue.use(VueSweetalert2);

new Vue({
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    render: h => h(MiniAbout)
}).$mount('#mini-about-component');
new Vue({
    render: h => h(Promotions)
}).$mount('#promotions-component');
