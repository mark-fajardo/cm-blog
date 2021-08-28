const state = {
    page_config: {
        sliders: {},
        mini_about: {
            title: '',
            small_title: '',
            content: '',
            img: ['', '']
        }
    }
};

const mutations = {
    /**
     * Set page config
     * @param state
     * @param page_config
     * @constructor
     */
    SET_PAGE_CONFIG(state, page_config) {
        state.page_config = JSON.parse(JSON.stringify(page_config));
    },
};

const actions = {
    /**
     * Fetch page config.
     * @param commit
     */
    async getPageConfig({ commit }, selected_page_tag) {
        await window.axios.get('/rest/page-config', {
            params: {
                page_tag: selected_page_tag
            }
        }).then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_PAGE_CONFIG', oResponse.data.data);
            }
        }).catch(() => {
            commit('SET_PAGE_CONFIG', {});
        });
    },
};

const getters = {
    /**
     * Get current page config.
     * @param state
     * @returns object
     */
    page_config(state) {
        return state.page_config;
    },

    /**
     * Get slider config.
     * @param state
     * @returns {any}
     */
    sliders(state) {
        return state.page_config.sliders;
    },

    /**
     * Get mini about config.
     * @param state
     * @returns {any}
     */
    mini_about(state) {
        return state.page_config.mini_about;
    }
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
