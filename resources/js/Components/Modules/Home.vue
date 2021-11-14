<template>
    <section>
        <MiniAbout/>
        <Promotions/>
        <RecipeList/>
        <Vlogs/>
        <SocialMediaFeed/>
        <Footer/>
    </section>
</template>

<script>
    import { mapActions } from 'vuex';
    import MiniAbout from '../Home/MiniAbout';
    import Promotions from '../Home/Promotions';
    import RecipeList from '../Home/RecipeList';
    import Footer from '../../Common/Footer';
    import SocialMediaFeed from '../../Common/SocialMediaFeed';
    import Vlogs from '../../Common/Vlogs';
    import { jQueryMixin } from '../../main';
    import { PageTags } from '../../constants';

    export default {
        components: { Vlogs, SocialMediaFeed, Footer, RecipeList, Promotions, MiniAbout },
        async created() {
            await this.prepareData();
        },
        methods: {
            ...mapActions('PageConfig', {
                getPageConfig: 'getPageConfig'
            }),

            /**
             * Prepare data for the components config.
             */
            async prepareData() {
                Promise.all([
                    await this.getPageConfig(PageTags.HOME),
                ]).then(() => {
                    jQueryMixin.method.init();
                })
            }
        }
    }
</script>
