<template>
    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
        <div v-for="recipe in timeline_recipes" class="single-blog text-center wow fadeIn">
            <div class="blog-image-sldie">
                <img :src="recipe.main_image" alt="">
            </div>
            <div class="blog-details">
                <div class="title-and-meta">
                    <h3><a :href="'/recipe/' + recipe.slug_name">{{ recipe.recipe_name }}</a></h3>
                    <p class="post-meta">By <a href="/about-me">Chef Morris Danzen</a> | <a>{{ convertDateTime(recipe.created_at) }}</a></p>
                </div>
                <div class="blog-content">
                    <p>{{ limitText(recipe.description, 300) }}</p>
                    <a :href="'/recipe/' + recipe.slug_name" class="read-more">View Recipe</a>
                </div>
            </div>
        </div>
        <div class="row" v-if="areTimelineAvailable === false">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="area-title text-center">
                    <h4>Currently, there are no timeline recipes saved.</h4>
                </div>
            </div>
        </div>
        <div class="row read-more-area" v-if="hide_load_more === false && areTimelineAvailable === true">
            <a @click="prepareData" class="read-more">Load more</a>
        </div>
        <div class="row read-more-area">
<!--            <Adsense-->
<!--                :data-ad-client="ENV_.DATA_AD.HORIZONTAL_DISPLAY.CLIENT"-->
<!--                :data-ad-slot="ENV_.DATA_AD.HORIZONTAL_DISPLAY.SLOT">-->
<!--            </Adsense>-->
        </div>
    </div>
</template>

<script>
    import { jQueryMixin } from '../../main';
    import { mapActions, mapGetters, mapMutations} from 'vuex';

    export default {
        name: 'Content',
        data() {
            return {
                hide_load_more: false,
                timeline_recipes: []
            };
        },
        computed: {
            ...mapGetters('Timeline', ['timeline', 'offset']),

            /**
             * Return true if images are available.
             * @returns {boolean}
             */
            areTimelineAvailable() {
                return (this.$_.isEmpty(this.timeline_recipes) === false);
            }
        },
        async mounted() {
            await this.prepareData();
        },
        methods: {
            ...mapActions('Timeline', ['getTimeline']),

            /**
             * Prepare data for the components config.
             */
            async prepareData() {
                Promise.all([
                    await this.getTimeline()
                ]).then(() => {
                    if (this.$_.isEmpty(this.timeline) === false) {
                        this.timeline_recipes = [...this.timeline_recipes, ...this.timeline];
                    } else {
                        this.hide_load_more = true;
                    }
                });
            }
        }
    }
</script>

<style scoped>
    .read-more-area {
        margin: auto;
        text-align: center;
        margin-bottom: 100px;
    }

    .read-more-area .read-more {
        cursor: pointer;
    }
</style>
