const state = {
    message_sent: false
};

const mutations = {
    /**
     * Set response for checking.
     * @param state
     * @param message_sent
     * @constructor
     */
    SET_MESSAGE_SENT(state, message_sent) {
        state.message_sent = message_sent;
    },
};

const actions = {
    /**
     * Send message from front.
     * @param commit
     * @param params
     * @returns {Promise<void>}
     */
    async sendMessage({ commit }, params) {
        console.log(params);
        await window.axios.post('/rest/message', { params })
            .then((oResponse) => {
                commit('SET_MESSAGE_SENT', oResponse.data.success);
            }).catch(() => {
                commit('SET_MESSAGE_SENT', false);
            });
    },
};

const getters = {
    /**
     * Contains message sent response.
     * @param state
     * @returns {any}
     */
    message_sent(state) {
        return state.message_sent;
    }
};

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}
