require('./app');
import Header from './Components/Recipe/Header';
import Recipe from './Components/Modules/Recipe';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(Recipe)
}).$mount('#app');
