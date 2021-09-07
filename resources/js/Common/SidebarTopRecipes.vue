<template>
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
</template>

<script>
    import { mapActions, mapGetters} from 'vuex';

    export default {
        name: 'SidebarTopRecipes',
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
        mounted() {
            this.getRecommendedRecipes();
        },
        methods: {
            ...mapActions('Recipe', ['getRecommendedRecipes']),
        }
    }
</script>

<style scoped>
.post-tumb img {
    width: 80px;
    height: 80px;
    background-size: cover;
    cursor: pointer;
    object-fit: cover;
}
</style>
