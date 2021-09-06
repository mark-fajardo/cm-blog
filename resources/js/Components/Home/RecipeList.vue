<template>
    <section class="menus-area section-padding" id="menu" v-show="areRecommendedRecipesAvailable === true">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Recipe List</h2>
                        <h3>New and Recommended Recipes</h3>
                    </div>
                </div>
            </div>
            <div class="row food-menu-list">
                <div v-for="recommended_recipe in limitObject(recommended_recipes, 12)" class="col-md-3 col-lg-3 col-sm-6 col-xs-12 single-menu">
                    <div class="food-menu-img-container">
                        <div class="food-menu-img">
                            <a :href="'/recipe/' + recommended_recipe.slug_name"><img :src="recommended_recipe.main_image" alt="Can't load image"></a>
                        </div>
                    </div>
                    <div class="food-menu-details">
                        <a :href="'/recipe/' + recommended_recipe.slug_name"><h4>{{ recommended_recipe.recipe_name }}</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';

    export default {
        name: 'RecipeList',
        computed: {
            ...mapGetters('Recipe', ['recommended_recipes']),

            /**
             * Check if recommended recipes are available
             * @returns {boolean}
             */
            areRecommendedRecipesAvailable() {
                return (this.$_.isEmpty(this.recommended_recipes) === false);
            },
        },
        methods: {
            ...mapActions('Recipe', ['getRecommendedRecipes']),
        },
        mounted() {
            this.getRecommendedRecipes();
        }
    }
</script>

<style scoped>
    .menus-area {
        background-color: #FFF;
    }

    .food-menu-img {
        overflow: hidden;
        height: 100%;
    }

    .food-menu-img img {
        height: 100%;
    }

    .food-menu-img-container {
        min-height: 150px;
    }
</style>
