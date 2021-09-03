<template>
    <section class="style-three promotions-area section-padding" v-show="areRecommendedRecipesAvailable === true">
        <div class="promotion-area-bg"></div>
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Top Recipes</h2>
                        <h3>New and Easy to Make Recipes</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="menu-discount-offer col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div v-for="recipe in limitObject(shuffle(recommended_recipes), 20)" class="single-promotions">
                        <div class="promotions-img">
                            <img :src="recipe.main_image" alt="">
                        </div>
                        <div class="promotions-details">
                            <h3>{{ recipe.recipe_name }}</h3>
                            <p>{{ limitText(recipe.short_description, 40) }}</p>
                            <a :href="'/recipe/' + recipe.slug_name" class="read-more">View Recipe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    import { jQueryMixin } from '../../main';

    export default {
        name: 'RecommendedRecipes',
        computed: {
            ...mapGetters('Recipe', ['recommended_recipes']),

            /**
             * Check if recommended recipes are available
             * @returns {boolean}
             */
            areRecommendedRecipesAvailable() {
                return (this.$_.isEmpty(this.recommended_recipes) === false);
            },

            /**
             * Check if recommended recipes can be a slider.
             * @returns {boolean}
             */
            showSlider() {
                return (Object.keys(this.recommended_recipes).length > 1);
            },
        },
        methods: {
            ...mapActions('Recipe', ['getRecommendedRecipes']),
        },
        mounted() {
            Promise.all([
                this.getRecommendedRecipes()
            ]).then(() => {
                jQueryMixin.method.loadOwlCarousel(this.showSlider);
            });
        }
    }
</script>
