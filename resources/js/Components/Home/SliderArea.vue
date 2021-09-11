<template>
    <div class="slider-area" style="background-color: #bcbcbc">
        <div class="pogoSlider">
            <div v-for="slider in limitedSliders" class="pogoSlider-slide" data-transition="fade" data-duration="1500" :style="'background:url(' + validatePlatform(slider.image_url, slider.image_url_portrait) + ') no-repeat scroll 0 0 / cover;'">
                <h2 class="pogoSlider-slide-element no-select" data-in="expand" data-out="expand" data-duration="700">{{ slider.header }}</h2>
                <h1 class="pogoSlider-slide-element no-select" data-in="expand" data-out="expand" data-duration="1500" v-html="renderSpan(slider.footer)"></h1>
                <h3 v-show="isEmpty(slider.href) === false" class="pogoSlider-slide-element no-select" data-in="expand" data-out="expand" data-duration="2300"><a :href="slider.href">{{ slider.button }}</a></h3>
            </div>
        </div>
    </div>
</template>

<script>
    import { vueWindowSizeMixin } from 'vue-window-size';
    import { detectPlatformMixin } from '../../detectPlatformMixin';
    import { mapGetters } from 'vuex';

    export default {
        name: 'SliderArea',
        computed: {
            ...mapGetters('PageConfig', ['sliders']),

            /**
             * Return limited sliders.
             * @returns {*[]}
             */
            limitedSliders() {
                let limitedSliders = this.limitObject(this.sliders, 20);
                return (limitedSliders.length === 1) ? limitedSliders.concat(limitedSliders[0]) : limitedSliders;
            }
        },
        methods: {
            /**
             * Render span created strings.
             * @param render
             */
            renderSpan(render) {
                render = render.replace('**', '<span>');
                return render.replace('***', '</span>');
            },

            /**
             * Check if string was empty.
             * @param str
             * @returns {boolean}
             */
            isEmpty(str) {
                return (this.$_.isEmpty(str) === true);
            },

            /**
             * Validate image to be shown.
             * @param image_url
             * @param image_url_portrait
             * @returns {*}
             */
            validatePlatform(image_url, image_url_portrait) {
                return (this.isMobile === false || this.windowWidth > 500) ? image_url : image_url_portrait;
            }
        },
        mixins: [ vueWindowSizeMixin, detectPlatformMixin ]
    }
</script>
