const state = {
    gallery: {},
    images_only: {},
    offset: 0,
    limit: 12,
};

const mutations = {
    /**
     * Set all gallery images.
     * @param state
     * @param gallery
     * @constructor
     */
    SET_ALL_GALLERY_IMAGES(state, gallery) {
        state.gallery = gallery;
    },

    /**
     * Set all images onlly.
     * @param state
     * @param images_only
     * @constructor
     */
    SET_ALL_IMAGES_ONLY(state, images_only) {
        state.images_only = images_only;
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
};

const actions = {
    /**
     * Fetch gallery images
     * @param commit
     * @param state
     */
    async getGalleryImages({ commit, state }) {
        await window.axios.get('/rest/gallery', {
            params: {
                offset: state.offset,
                limit: state.limit
            }
        }).then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_OFFSET', state.offset + 12);
                commit('SET_ALL_GALLERY_IMAGES', oResponse.data.data.gallery);
                commit('SET_ALL_IMAGES_ONLY', oResponse.data.data.images);
            } else {
                commit('SET_ALL_GALLERY_IMAGES', {});
                commit('SET_ALL_IMAGES_ONLY', {});
            }
        }).catch(() => {
            commit('SET_ALL_GALLERY_IMAGES', {});
            commit('SET_ALL_IMAGES_ONLY', {});
        });
    },
};

const getters = {
    /**
     * Get current offset.
     * @param state
     * @returns {any}
     */
    offset(state) {
        return state.offset;
    },

    /**
     * Get all gallery images.
     * @param state
     * @returns {any}
     */
    gallery(state) {
        return state.gallery;
    },

    /**
     * Get all images only.
     * @param state
     * @returns {any}
     */
    images_only(state) {
        return state.images_only;
    },
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
