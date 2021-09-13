require('./bootstrap');
require('es6-object-assign/auto');
require('./common');
window.Vue = require('vue');
window.VueJQuery = require('jquery');
window.$moment = require('moment-timezone');

import mixins from './mixins';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import _ from 'lodash';
import VueFbCustomerChat from 'vue-fb-customer-chat'
import { Env_ } from './constants';
import Ads from 'vue-google-adsense';
import VueSocialSharing from 'vue-social-sharing';
import VueLazyload from 'vue-lazyload';

Vue.use(VueLazyload);
Vue.use(VueSocialSharing);
Vue.use(require('vue-script2'))
Vue.use(Ads.Adsense)
Vue.use(Ads.InArticleAdsense)
Vue.use(Ads.InFeedAdsense)
Object.defineProperty(Vue.prototype, '$_', { value: _ });
Vue.use(VueSweetalert2);
Vue.mixin(mixins);
Vue.use(VueFbCustomerChat, {
    page_id: Env_.FB_PAGE_ID,
    theme_color: '#d0963e',
    locale: 'en_US',
})
