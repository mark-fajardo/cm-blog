<template>
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
        <div class="blog-sidebar">
            <div class="single-sidebar-widget">
                <form action="/recipe-list?#search-results-area">
                    <input type="search" name="search" id="search" placeholder="Search..." autocomplete="off">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="single-sidebar-widget post-widget wow fadeIn" v-show="areRecommendedRecipesAvailable === true">
                <h4>Top Recipes</h4>
                <ul>
                    <li class="s_post" v-for="recipe in limitObject(shuffle(recommended_recipes), 4)">
                        <div class="post-tumb alignleft">
                            <a :href="'/recipe/' + recipe.slug_name"><img :src="recipe.main_image" alt="Can't load image"></a>
                        </div>
                        <div class="post-title-and-date">
                            <h4><a :href="'/recipe/' + recipe.slug_name">{{ recipe.recipe_name }}</a></h4>
                            <p class="post-meta"><a :href="'/recipe/' + recipe.slug_name">{{ convertDateTime(recipe.created_at) }}</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="single-sidebar-widget social-widget wow fadeIn">
                <h4>Connect with me</h4>
                <ul>
                    <li class="s_facebook"><a href="//www.facebook.com/Chefmorrisdanzen" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"></i></a></li>
                    <li class="s_youtube"><a href="//www.youtube.com/Chef%20Morris%20Danzen" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube"></i></a></li>
                    <li class="s_instagram"><a href="//www.instagram.com/chef_morrisdanzen/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i></a></li>
                    <li class="s_whats_app"><a href="//api.whatsapp.com/send?phone=393512671387" target="_blank" rel="noopener noreferrer"><i class="fa fa-whatsapp"></i></a></li>
                </ul>
            </div>
            <div class="single-sidebar-widget tag-widget wow fadeIn">
                <h4>Recipe Tags</h4>
                <ul>
                    <li v-for="ingredients in recipeIngredients"><a>{{ ingredients }}</a></li>
                    <li v-show="areRecipeCategoriesAvailable === true" v-for="category in recipeCategories"><a>{{ getDefaultValue(categories[category].category_name) }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'RecipeViewSideBar',
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
