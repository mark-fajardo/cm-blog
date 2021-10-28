<template>
    <section class="menus-area section-padding" id="menu" v-show="areRecommendedRecipesAvailable === true">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Recipes</h2>
                        <h3>New and Recommended Recipes</h3>
                    </div>
                </div>
            </div>
            <div class="row food-menu-list">
                <div v-for="recommended_recipe in limitObject(recommended_recipes, 12)" class="col-md-3 col-lg-3 col-sm-6 col-xs-12 single-menu align-self-start">
                    <div class="food-menu-img-container">
                        <div class="food-menu-img">
                            <a :href="'/recipe/' + recommended_recipe.slug_name"><img :src="recommended_recipe.main_image" alt="Can't load image"></a>
                        </div>
                    </div>
                    <div class="food-menu-details">
                        <a :href="'/recipe/' + recommended_recipe.slug_name" :title="recommended_recipe.recipe_name"><h4>{{ limitText(recommended_recipe.recipe_name, 18) }}</h4></a>
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
        text-align: center;
    }

    .food-menu-img img {
        width: 300px;
        height: 300px;
        background-size: cover;
        cursor: pointer;
        object-fit: cover;
    }

    .tooltip {
        display: block !important;
        z-index: 10000;
    }

    .tooltip .tooltip-inner {
        background: black;
        color: white;
        border-radius: 16px;
        padding: 5px 10px 4px;
    }

    .tooltip .tooltip-arrow {
        width: 0;
        height: 0;
        border-style: solid;
        position: absolute;
        margin: 5px;
        border-color: black;
    }

    .tooltip[x-placement^="top"] {
        margin-bottom: 5px;
    }

    .tooltip[x-placement^="top"] .tooltip-arrow {
        border-width: 5px 5px 0 5px;
        border-left-color: transparent !important;
        border-right-color: transparent !important;
        border-bottom-color: transparent !important;
        bottom: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }

    .tooltip[x-placement^="bottom"] {
        margin-top: 5px;
    }

    .tooltip[x-placement^="bottom"] .tooltip-arrow {
        border-width: 0 5px 5px 5px;
        border-left-color: transparent !important;
        border-right-color: transparent !important;
        border-top-color: transparent !important;
        top: -5px;
        left: calc(50% - 5px);
        margin-top: 0;
        margin-bottom: 0;
    }

    .tooltip[x-placement^="right"] {
        margin-left: 5px;
    }

    .tooltip[x-placement^="right"] .tooltip-arrow {
        border-width: 5px 5px 5px 0;
        border-left-color: transparent !important;
        border-top-color: transparent !important;
        border-bottom-color: transparent !important;
        left: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }

    .tooltip[x-placement^="left"] {
        margin-right: 5px;
    }

    .tooltip[x-placement^="left"] .tooltip-arrow {
        border-width: 5px 0 5px 5px;
        border-top-color: transparent !important;
        border-right-color: transparent !important;
        border-bottom-color: transparent !important;
        right: -5px;
        top: calc(50% - 5px);
        margin-left: 0;
        margin-right: 0;
    }

    .tooltip[aria-hidden='true'] {
        visibility: hidden;
        opacity: 0;
        transition: opacity .15s, visibility .15s;
    }

    .tooltip[aria-hidden='false'] {
        visibility: visible;
        opacity: 1;
        transition: opacity .15s;
    }
</style>
