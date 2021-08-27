require('./bootstrap');
require('es6-object-assign/auto');
require('./common');
window.Vue = require('vue');

import Header from './Components/Home/Header';
import Home from './Components/Modules/Home';
import mixins from './mixins';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.mixin(mixins);
Vue.use(VueSweetalert2);

new Vue({
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    render: h => h(Home)
}).$mount('#app');
