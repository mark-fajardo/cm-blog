require('./app');
import Header from './Components/RecipeList/Header';
import RecipeList from './Components/Modules/RecipeList';
import store from './Store/store';

new Vue({
    store,
    render: h => h(Header)
}).$mount('#header-component');
new Vue({
    store,
    render: h => h(RecipeList)
}).$mount('#app');
