<template>
    <div class="single-blog-page single-blog text-justify wow fadeIn">
        <div class="blog-image-sldie" v-show="recipe.main_image !== ''">
            <carousel
                v-if="areImagesAvailable === true"
                :items="1"
                :margin="15"
                :center="true"
                :nav="false"
                :autoplay="true"
                :autoplayTimeout="5000">
                <img v-for="gallery in recipe.gallery" :src="gallery" alt="Can't load image">
            </carousel>
        </div>
        <div class="blog-details">
            <div class="title-and-meta">
                <h3><a :href="'/recipe/' + recipe.slug_name">{{ recipe.recipe_name }}</a></h3>
                <p class="post-meta">By <a>Chef Morris Danzen</a> | <a>{{ difficulties[parseInt(recipe.difficulty) - 1] }}</a> | <a>{{ convertDateTime(recipe.created_at) }}</a></p>
            </div>
            <div class="blog-content">
                <p class="short-description">{{ recipe.short_description }}</p>
                <p>
                    <YoutubeVideoPlayer
                        v-show="this.$_.isEmpty(recipe.youtube_video_id) === false"
                        :video-id="(this.$_.isEmpty(recipe.youtube_video_id)) ? '' : recipe.youtube_video_id"
                        :video-title="recipe.recipe_name"
                        :Height="400">
                    </YoutubeVideoPlayer>
                </p>
                <p class="long-description">{{ recipe.description }}</p>
<!--                <Adsense-->
<!--                    :data-ad-client="ENV_.DATA_AD.SQUARE_DISPLAY.CLIENT"-->
<!--                    :data-ad-slot="ENV_.DATA_AD.SQUARE_DISPLAY.SLOT">-->
<!--                </Adsense>-->
                <h4>Ingredients</h4>
                <div class="ingredients-list col-lg-12">
                    <ul class="list-group col-lg-6 mx-auto">
                        <li v-for="ingredient in recipe.ingredients_json" class="list-group-item">{{ ingredient }}</li>
                    </ul>
                </div>
                <h4>Procedure</h4>
                <p class="blog-content-p" v-html="recipe.procedure"></p>
                <h4 v-show="this.$_.isEmpty(recipe.notes) === false">Notes</h4>
                <p class="blog-content-p" v-show="this.$_.isEmpty(recipe.notes) === false">{{ recipe.notes }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import YoutubeVideoPlayer from '../../Common/YoutubeVideoPlayer';
    import carousel from 'vue-owl-carousel'

    export default {
        name: 'RecipeView',
        components: { YoutubeVideoPlayer, carousel },
        data() {
            return {
                difficulties: [
                    'Beginner',
                    'Intermediate',
                    'Expert'
                ]
            };
        },
        computed: {
            ...mapGetters('Recipe', ['recipe']),
            ...mapGetters('Category', ['categories']),

            /**
             * Check if images are available.
             * @returns {boolean}
             */
            areImagesAvailable() {
                return (this.$_.isEmpty(this.recipe.gallery) === false);
            }
        }
    }
</script>

<style scoped>
    .short-description {
        margin-bottom: 50px;
        text-indent: 50px;
    }
    .ingredients-list, .blog-content-p {
        margin-bottom: 50px;
    }
    .single-blog {
        /*margin-top: 10px;*/
    }
    .long-description {
        margin-top: 50px;
        margin-bottom: 50px;
        text-indent: 50px;
    }
</style>
