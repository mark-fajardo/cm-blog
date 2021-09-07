require('./app');
import Header from './Components/Timeline/Header';
import Timeline from './Components/Modules/Timeline';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(Timeline)
}).$mount('#app');
