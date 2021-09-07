<template>
    <section>
        <section class="blog-page blog-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                        <RecipeView/>
                        <RecipeFooter/>
                    </div>
                    <RecipeViewSideBar/>
                </div>
            </div>
        </section>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import { jQueryMixin } from '../../main';
    import RecipeView from '../Recipe/RecipeView';
    import { mapActions } from 'vuex';
    import RecipeFooter from '../Recipe/RecipeFooter';
    import RecipeViewSideBar from '../Recipe/RecipeViewSideBar';

    export default {
        components: { RecipeViewSideBar, RecipeFooter, RecipeView, Footer },
        async created() {
            await this.prepareData();
        },
        mounted() {
            jQueryMixin.method.loadSticky();
            jQueryMixin.method.loadSearch();
        },
        methods: {
            ...mapActions('Recipe', ['getRecipeBySlugName']),
            ...mapActions('Category', ['getAllCategories']),

            /**
             * Prepare data for the components config.
             */
            async prepareData() {
                Promise.all([
                    await this.getAllCategories(),
                    await this.getRecipeBySlugName(),
                ]).then(() => {
                    jQueryMixin.method.removeLoader();
                });
            }
        }
    }
</script>
