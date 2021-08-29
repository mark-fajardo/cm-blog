const state = {
    categories: {}
};

const mutations = {
    /**
     * Set categories
     * @param state
     * @param categories
     * @constructor
     */
    SET_CATEGORIES(state, categories) {
        state.categories = JSON.parse(JSON.stringify(categories));
    },
};

const actions = {
    /**
     * Fetch all categories
     * @param commit
     */
    async getAllCategories({ commit }) {
        await window.axios.get('/rest/category').then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_CATEGORIES', oResponse.data.data);
            }
        }).catch(() => {
            commit('SET_CATEGORIES', {});
        });
    },
};

const getters = {
    /**
     * Get all categories.
     * @param state
     * @returns {any}
     */
    categories(state) {
        return state.categories;
    }
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
