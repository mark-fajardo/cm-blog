/**
 * Detect platform mixin.
 * To detect what platform currently the page where is.
 * @type {{computed: {isMobile(): boolean}}}
 */
export const detectPlatformMixin = {
    computed: {
        isMobile() {
            return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
        }
    }
}
