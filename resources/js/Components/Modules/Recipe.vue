<template>
    <section>
        <RecipeView/>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import { jQueryMixin } from '../../main';
    import RecipeView from '../Recipe/RecipeView';
    import { mapActions } from 'vuex';

    export default {
        components: { RecipeView, Footer },
        async created() {
            await this.prepareData();
        },
        mounted() {
            jQueryMixin.method.loadSticky();
            jQueryMixin.method.loadSearch();
            jQueryMixin.method.loadOwlCarousel();
        },
        methods: {
            ...mapActions('Recipe', ['getRecipeBySlugName', 'getRecommendedRecipes']),
            ...mapActions('Category', ['getAllCategories']),

            /**
             * Prepare data for the components config.
             */
            async prepareData() {
                Promise.all([
                    await this.getAllCategories(),
                    await this.getRecipeBySlugName(),
                    this.getRecommendedRecipes(),
                ]).then(() => {
                    jQueryMixin.method.removeLoader();
                });
            }
        }
    }
</script>
