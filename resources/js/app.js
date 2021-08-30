require('./bootstrap');
require('es6-object-assign/auto');
require('./common');
window.Vue = require('vue');
window.VueJQuery = require('jquery');
window.$moment = require('moment-timezone');

import mixins from './mixins';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueGtag from 'vue-gtag';
import _ from 'lodash';
import VueFbCustomerChat from 'vue-fb-customer-chat'

Object.defineProperty(Vue.prototype, '$_', { value: _ });
Vue.use(VueSweetalert2);
Vue.mixin(mixins);
Vue.use(VueGtag, {
    config: { id: "UA-1234567-1" },
    params: {
        send_page_view: true
    }
});

Vue.use(VueFbCustomerChat, {
    page_id: 455444121604547,
    theme_color: '#d0963e',
    locale: 'en_US',
})
