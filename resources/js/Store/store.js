import Vue from 'vue';
import Vuex from 'vuex';
import PageConfig from './Modules/pageConfig.store';
import Recipe from './Modules/recipe.store';
import Category from './Modules/category.store';
import Gallery from './Modules/gallery.store';
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        PageConfig,
        Recipe,
        Category,
        Gallery
    }
});
