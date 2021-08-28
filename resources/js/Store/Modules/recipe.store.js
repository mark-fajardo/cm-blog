const state = {
    promoted_recipe: {
        recipe_name: '',
        youtube_video_id: '',
        main_image: ''
    },
    recommended_recipes: {},
    recommended_video_recipes: {}
};

const mutations = {
    /**
     * Set promoted recipe
     * @param state
     * @param promoted_recipe
     * @constructor
     */
    SET_PROMOTED_RECIPE(state, promoted_recipe) {
        state.promoted_recipe = JSON.parse(JSON.stringify(promoted_recipe));
    },

    /**
     * Set recommended recipes.
     * @param state
     * @param recommended_recipes
     * @constructor
     */
    SET_RECOMMENDED_RECIPES(state, recommended_recipes) {
        state.recommended_recipes = JSON.parse(JSON.stringify(recommended_recipes));
    },

    /**
     * Set recommended video recipes.
     * @param state
     * @param recommended_video_recipes
     * @constructor
     */
    SET_RECOMMENDED_VIDEO_RECIPES(state, recommended_video_recipes) {
        state.recommended_video_recipes = JSON.parse(JSON.stringify(recommended_video_recipes));
    },
};

const actions = {
    /**
     * Fetch promoted recipe
     * @param commit
     */
    async getPromotedRecipe({ commit }) {
        await window.axios.get('/rest/recipe/promoted').then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_PROMOTED_RECIPE', oResponse.data.data);
            }
        }).catch(() => {
            commit('SET_PROMOTED_RECIPE', {});
        });
    },

    /**
     * Fetch recommended recipe
     * @param commit
     */
    async getRecommendedRecipes({ commit }) {
        await window.axios.get('/rest/recipe/recommended').then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_RECOMMENDED_RECIPES', oResponse.data.data);
            }
        }).catch(() => {
            commit('SET_RECOMMENDED_RECIPES', {});
        });
    },

    /**
     * Fetch recommended video recipe
     * @param commit
     */
    async getRecommendedVideoRecipes({ commit }) {
        await window.axios.get('/rest/recipe/recommended/videos').then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_RECOMMENDED_VIDEO_RECIPES', oResponse.data.data);
            }
        }).catch(() => {
            commit('SET_RECOMMENDED_VIDEO_RECIPES', {});
        });
    },
};

const getters = {
    /**
     * Get promoted recipe.
     * @param state
     * @returns {any}
     */
    promoted_recipe(state) {
        return state.promoted_recipe;
    },

    /**
     * Get all recommended recipes.
     * @param state
     * @returns {any}
     */
    recommended_recipes(state) {
        return state.recommended_recipes;
    },

    /**
     * Get all recommended video recipes.
     * @param state
     * @returns {any}
     */
    recommended_video_recipes(state) {
        return state.recommended_video_recipes;
    }
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
