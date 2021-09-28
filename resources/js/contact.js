require('./app');
import Header from './Components/Contact/Header';
import Contact from './Components/Modules/Contact';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(Contact)
}).$mount('#app');
