import { PageTags } from '../../constants';

const state = {
    page_config: {
        sliders: {},
        mini_about: {
            title: '',
            small_title: '',
            content: '',
            img: ['', '']
        }
    },
    page_common_config: {
        header: {
            img: ''
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

    /**
     * Set page common config
     * @param state
     * @param page_config
     * @constructor
     */
    SET_PAGE_COMMON_CONFIG(state, page_config) {
        state.page_common_config = JSON.parse(JSON.stringify(page_config));
    },
};

const actions = {
    /**
     * Fetch page config.
     * @param commit
     */
    async getPageConfig({ commit }, selected_page_tag) {
        let config = (selected_page_tag === PageTags.HOME) ? 'SET_PAGE_CONFIG' : 'SET_PAGE_COMMON_CONFIG';
        await window.axios.get('/rest/page-config', {
            params: {
                page_tag: selected_page_tag
            }
        }).then((oResponse) => {
            if (oResponse.data.success === true) {
                commit(config, oResponse.data.data);
            }
        }).catch(() => {
            commit(config, {});
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
    },

    /**
     * Get current header page image.
     * @param state
     * @returns object
     */
    header_img(state) {
        return state.page_common_config.header.img;
    },
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
