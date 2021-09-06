const state = {
    promoted_recipe: {
        recipe_name: '',
        youtube_video_id: '',
        main_image: ''
    },
    recommended_recipes: {},
    recommended_video_recipes: {},
    recipe_count: 0,
    recipe: {
        main_image: '',
        recipe_name: '',
        short_description: '',
        description: '',
        procedure: '',
        category_json: {},
        ingredients_json: {},
        youtube_video_id: '',
        created_at: '',
    },
    recipes: {},
    search_keyword: '',
    offset: 0,
    limit: 6
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

    /**
     * Set all recipe count.
     * @param state
     * @param recipe_count
     * @constructor
     */
    SET_ALL_RECIPE_COUNT(state, recipe_count) {
        state.recipe_count = recipe_count;
    },

    /**
     * Set all recipes.
     * @param state
     * @param recipes
     * @constructor
     */
    SET_ALL_RECIPES(state, recipes) {
        state.recipes = recipes;
    },

    /**
     * Set offset.
     * @param state
     * @param offset
     * @constructor
     */
    SET_OFFSET(state, offset) {
        state.offset = offset;
    },

    /**
     * Set search keyword.
     * @param state
     * @param search_keyword
     * @constructor
     */
    SET_SEARCH_KEYWORD(state, search_keyword) {
        state.search_keyword = search_keyword;
    },

    /**
     * Set recipe.
     * @param state
     * @param recipe
     * @constructor
     */
    SET_RECIPE(state, recipe) {
        state.recipe = recipe;
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

    /**
     * Fetch recipe count
     * @param commit
     */
    async getRecipeCount({ commit }) {
        await window.axios.get('/rest/recipe/count', {
            params: {
                search_keyword: state.search_keyword
            }
        }).then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_ALL_RECIPE_COUNT', oResponse.data.data.count);
            }
        }).catch(() => {
            commit('SET_ALL_RECIPE_COUNT', {});
        });
    },

    /**
     * Fetch recipe
     * @param commit
     */
    async getRecipe({ commit, state }) {
        await window.axios.get('/rest/recipe', {
            params: {
                offset: state.offset,
                limit: state.limit,
                search_keyword: state.search_keyword
            }
        }).then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_ALL_RECIPES', oResponse.data.data);
            }
        }).catch(() => {
            commit('SET_ALL_RECIPES', {});
        });
    },

    /**
     * Fetch recipe by slug name
     * @param commit
     */
    async getRecipeBySlugName({ commit }) {
        await window.axios.get('/rest' + window.location.pathname).then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_RECIPE', oResponse.data.data);
            }
        }).catch(() => {
            commit('SET_RECIPE', {});
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
    },

    /**
     * Get all recipe count.
     * @param state
     * @returns {any}
     */
    recipe_count(state) {
        return state.recipe_count;
    },

    /**
     * Get all recipes.
     * @param state
     * @returns {any}
     */
    recipes(state) {
        return state.recipes;
    },

    /**
     * Get current recipe.
     * @param state
     * @returns {any}
     */
    recipe(state) {
        return state.recipe;
    }
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
