const state = {
    timeline: {},
    offset: 0,
    limit: 6,
};

const mutations = {
    /**
     * Set timeline.
     * @param state
     * @param timeline
     * @constructor
     */
    SET_TIMELINE(state, timeline) {
        state.timeline = timeline;
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
     * Fetch timeline
     * @param commit
     * @param state
     */
    async getTimeline({ commit, state }) {
        await window.axios.get('/rest/timeline', {
            params: {
                offset: state.offset,
                limit: state.limit
            }
        }).then((oResponse) => {
            if (oResponse.data.success === true) {
                commit('SET_OFFSET', state.offset + 6);
                commit('SET_TIMELINE', oResponse.data.data);
            } else {
                commit('SET_TIMELINE', {});
            }
        }).catch(() => {
            commit('SET_TIMELINE', {});
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
     * Get timeline.
     * @param state
     * @returns {any}
     */
    timeline(state) {
        return state.timeline;
    },
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
