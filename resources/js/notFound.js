require('./app');
import Header from './Components/NotFound/Header';
import NotFound from './Components/Modules/NotFound';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(NotFound)
}).$mount('#app');
