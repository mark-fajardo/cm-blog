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
         * Confirm message.
         * @param sIcon
         * @param sText
         * @param sConfirmButton
         * @param sCancelButton
         */
        confirmMessage(sIcon, sText, sConfirmButton, sCancelButton) {
            return this.$swal.fire({
                icon: sIcon,
                text: sText,
                showDenyButton: true,
                confirmButtonText: sConfirmButton,
                denyButtonText: sCancelButton,
            })
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
        },

        /**
         * Convert date time to readable date.
         * @param created_at
         * @returns {string}
         */
        convertDateTime(created_at) {
            let date_time_display = $moment(created_at).tz('UTC').format('LLLL');
            let splitted_date_time_display = date_time_display.split(' ');
            delete splitted_date_time_display[0];
            delete splitted_date_time_display[4];
            delete splitted_date_time_display[5];
            return splitted_date_time_display.join(' ');
        },

        /**
         * Shuffle object
         * @param sourceArray
         */
        shuffle(source) {
            for (var i = 0; i < source.length - 1; i++) {
                var j = i + Math.floor(Math.random() * (source.length - i));
                var temp = source[j];
                source[j] = source[i];
                source[i] = temp;
            }

            return source;
        },

        /**
         * Remove all spaces
         * @param str
         * @returns {*}
         */
        removeSpaces(str) {
            return str.replace(/\s/g, '');
        },

        /**
         * Get current HREF.
         */
        getCurrentHREF() {
            return window.location.href;
        },

        /**
         * Get default value for undefined values.
         */
        getDefaultValue(str) {
            return (str === undefined) ? '' : str;
        },

        /**
         * Limit long texts.
         * @param str
         * @param limit
         */
        limitText(str, limit) {
            return (str.substring(0, limit)).concat((str.length > limit) ? '...' : '');
        }
    }
};
