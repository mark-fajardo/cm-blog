<template>
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
        <div class="blog-sidebar">
            <SidebarSearch/>
            <div class="single-sidebar-widget">
<!--                <Adsense-->
<!--                    :data-ad-client="ENV_.DATA_AD.SQUARE_DISPLAY.CLIENT"-->
<!--                    :data-ad-slot="ENV_.DATA_AD.SQUARE_DISPLAY.SLOT">-->
<!--                </Adsense>-->
            </div>
            <SidebarTopRecipes/>
            <ConnectWithMe/>
            <div class="single-sidebar-widget tag-widget wow fadeIn">
                <h4>Recipe Tags</h4>
                <ul>
                    <li v-for="ingredients in recipeIngredients">
                        <a :href="'/recipes?search=' + encodeURI(ingredients) + '#search-results-area'">{{ limitText(ingredients, 12) }}</a>
                    </li>
                    <li v-show="areRecipeCategoriesAvailable === true" v-for="category in recipeCategories" :set="category_name = getDefaultValue(categories.find(x => x.id === parseInt(category)).category_name)">
                        <a :href="'/recipes?search=' + encodeURI(category_name) + '#search-results-area'">{{ category_name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import ConnectWithMe from '../../Common/ConnectWithMe';
    import SidebarSearch from '../../Common/SidebarSearch';
    import SidebarTopRecipes from '../../Common/SidebarTopRecipes';

    export default {
        name: 'RecipeViewSideBar',
        components: { SidebarTopRecipes, SidebarSearch, ConnectWithMe },
        computed: {
            ...mapGetters('Recipe', ['recommended_recipes', 'recipe']),
            ...mapGetters('Category', ['categories']),

            /**
             * Check if recommended recipes are available
             * @returns {boolean}
             */
            areRecommendedRecipesAvailable() {
                return (this.$_.isEmpty(this.recommended_recipes) === false);
            },

            /**
             * Check if recommended recipes are available
             * @returns {boolean}
             */
            areRecipeCategoriesAvailable() {
                return (this.$_.isEmpty(this.recipeCategories) === false);
            },

            /**
             * Contains recipe categories.
             */
            recipeCategories() {
                return this.recipe.category_json;
            },

            /**
             * Contains recipe ingredients.
             */
            recipeIngredients() {
                return this.recipe.ingredients_json;
            }
        }
    }
</script>
