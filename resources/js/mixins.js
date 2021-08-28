export default {
    data() {
        return {
        };
    },
    methods: {
        /**
         * alertMessage
         * @param sIcon
         * @param sText
         * @returns {boolean|Promise<SweetAlertResult<Awaited<any>>>}
         */
        alertMessage(sIcon, sText) {
            return this.$swal.fire({
                icon: sIcon,
                text: sText
            });
        },
    }
};
