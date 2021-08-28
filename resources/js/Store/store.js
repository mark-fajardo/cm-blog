import Vue from 'vue';
import Vuex from 'vuex';
import PageConfig from './Modules/pageConfig.store';
import Recipe from './Modules/recipe.store';
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        PageConfig,
        Recipe
    }
});
