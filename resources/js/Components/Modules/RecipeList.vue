<template>
    <section>
        <RecommendedRecipes/>
        <RecipeListView/>
        <Promotions/>
        <SocialMediaFeed/>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import { jQueryMixin } from '../../main';
    import Promotions from '../Home/Promotions';
    import RecommendedRecipes from '../RecipeList/RecommendedRecipes';
    import SocialMediaFeed from '../../Common/SocialMediaFeed';
    import RecipeListView from "../RecipeList/RecipeListView";
    import { mapActions } from 'vuex';
    import { PageTags } from '../../constants';

    export default {
        components: { RecipeListView, SocialMediaFeed, RecommendedRecipes, Promotions, Footer },
        async created() {
            await this.prepareData();
            await this.getPageConfig(PageTags.RECIPES);
        },
        methods: {
            ...mapActions('PageConfig', {
                getPageConfig: 'getPageConfig'
            }),

            /**
             * Prepare data for the components config.
             */
            async prepareData() {
                jQueryMixin.method.removeLoader();
                jQueryMixin.method.loadSticky();
                jQueryMixin.method.loadSearch();
            }
        }
    }
</script>
