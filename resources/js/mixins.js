import { Env_ } from './constants';

export default {
    data() {
        return {
            ENV_: Env_
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

        /**
         * Convert object to array and limit.
         * @param object
         * @param limit
         * @returns {*[]}
         */
        limitObject(object, limit) {
            let array = Object.keys(object).map((key) => object[key]);
            return array.slice(0, limit);
        }
    }
};
