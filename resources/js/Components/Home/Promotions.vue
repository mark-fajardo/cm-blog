<template>
    <section class="promotions-area section-padding" v-show="isPromotionAvailable === true">
        <div class="promotion-area-bg" :style="(isMainImageAvailable === true) ? 'background: rgba(0, 0, 0, 0) url('+ promoted_recipe.main_image +') no-repeat fixed 0 0 / cover' : 'background-color: #FFFFFF'">
        </div>
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Recipe of the Month</h2>
                        <h3>Special Promotion</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <div class="single-promotions text-center">
                            <div class="promotions-img" :style="(isYoutubeVideoIDAvailable === false) ? 'min-width: 200px; max-width: 800px; margin: 0 auto;' : ''">
                                <img v-if="isYoutubeVideoIDAvailable === false" :src="promoted_recipe.main_image" alt="">
                                <iframe v-if="isYoutubeVideoIDAvailable === true" :src="'//www.youtube.com/embed/' + promoted_recipe.youtube_video_id + '?controls=1&showinfo=0&rel=0&autoplay=1&loop=1&mute=1&playlist=' + promoted_recipe.youtube_video_id" allowfullscreen></iframe>
                            </div>
                            <div class="promotions-details">
                                <h4>{{ promoted_recipe.recipe_name }}</h4>
                                <a :href="'/recipes/' + promoted_recipe.slug_name" class="read-more">Check recipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';

    export default {
        name: 'Promotions',
        computed: {
            ...mapGetters('Recipe', ['promoted_recipe']),

            /**
             * Check if promoted recipe is available.
             * @returns {boolean}
             */
            isPromotionAvailable() {
                return (this.$_.isEmpty(this.promoted_recipe.recipe_name) === false);
            },

            /**
             * Check if the main image is available.
             * @returns {boolean}
             */
            isYoutubeVideoIDAvailable() {
                return (this.$_.isEmpty(this.promoted_recipe.youtube_video_id) === false);
            },

            /**
             * Check if the main image is available.
             * @returns {boolean}
             */
            isMainImageAvailable() {
                return (this.$_.isEmpty(this.promoted_recipe.main_image) === false);
            },
        },
        methods: {
            ...mapActions('Recipe', ['getPromotedRecipe']),
        },
        mounted() {
            this.getPromotedRecipe();
        }
    }
</script>

<style scoped>
    * { box-sizing: border-box; }
    .video-background {
        background: #000;
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        z-index: -99;
    }
    .video-foreground,
    .video-background iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    @media (min-aspect-ratio: 16/9) {
        .video-foreground { height: 300%; top: -100%; }
    }
    @media (max-aspect-ratio: 16/9) {
        .video-foreground { width: 300%; left: -100%; }
    }
    @media all and (max-width: 600px) {
        .vid-info { width: 50%; padding: .5rem; }
        .vid-info h1 { margin-bottom: .2rem; }
    }
    @media all and (max-width: 500px) {
        .vid-info .acronym { display: none; }
    }

    .promotions-img iframe {
        width: 100%;
        height: 500px;
        min-width: 200px;
        min-height: 200px;
    }
    .promotions-details {
        margin-top: 40px;
    }
</style>
