require('./app');
import Header from './Components/AboutMe/Header';
import AboutMe from './Components/Modules/AboutMe';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(AboutMe)
}).$mount('#app');
