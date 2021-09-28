require('./app');
import Header from './Components/Gallery/Header';
import Gallery from './Components/Modules/Gallery';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(Gallery)
}).$mount('#app');
