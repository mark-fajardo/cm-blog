<template>
    <section class="blog-area section-padding" v-show="areRecommendedVideoRecipesAvailable === true">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Cooking Vlogs</h2>
                        <h3>Cooking videos to help you</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-for="recommended_video_recipe in limitObject(recommended_video_recipes, 6)" class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="single-post text-center">
                        <div class="blog-post-img ">
                            <YoutubeVideoPlayer
                                :video-id="recommended_video_recipe.youtube_video_id"
                                :video-title="recommended_video_recipe.recipe_name">
                            </YoutubeVideoPlayer>
                        </div>
                        <div class="post-details">
                            <a :href="'//www.youtube.com/watch?v=' + recommended_video_recipe.youtube_video_id" class="post-meta-button" target="_blank" rel="noopener noreferrer">Watch on <i class="fa fa-youtube-play"></i>Youtube</a>
                            <h3><a :href="'/recipe/' + recommended_video_recipe.slug_name" target="_blank" rel="noopener noreferrer">{{ recommended_video_recipe.recipe_name }}</a></h3>
                            <p class="post-meta"><a :href="'/recipe/' + recommended_video_recipe.slug_name" target="_blank" rel="noopener noreferrer">{{ convertDateTime(recommended_video_recipe.youtube_video_upload_at, recommended_video_recipe.created_at) }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    import YoutubeVideoPlayer from './YoutubeVideoPlayer';

    export default {
        name: 'Vlogs',
        components: {YoutubeVideoPlayer},
        computed: {
            ...mapGetters('Recipe', ['recommended_video_recipes']),

            /**
             * Check if recommended recipes are available
             * @returns {boolean}
             */
            areRecommendedVideoRecipesAvailable() {
                return (this.$_.isEmpty(this.recommended_video_recipes) === false);
            },
        },
        methods: {
            ...mapActions('Recipe', ['getRecommendedVideoRecipes']),

            /**
             * Convert date time to readable date and day.
             * @param youtube_upload_date_at
             * @param created_at
             */
            convertDateTime(youtube_upload_date_at, created_at) {
                let date_time_display = $moment(youtube_upload_date_at ?? created_at).tz('UTC').format('LLLL');
                let splitted_date_time_display = date_time_display.split(' ');
                delete splitted_date_time_display[4];
                delete splitted_date_time_display[5];
                return splitted_date_time_display.join(' ');
            }
        },
        mounted() {
            this.getRecommendedVideoRecipes();
        },
    }
</script>

<style scoped>
    .post-details {
        margin-top: 140px;
    }
</style>
