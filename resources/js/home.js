require('./app');
import Header from './Components/Home/Header';
import Home from './Components/Modules/Home';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(Home)
}).$mount('#app');
