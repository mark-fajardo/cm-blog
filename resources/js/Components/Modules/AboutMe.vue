<template>
    <section>
        <Content/>
        <SocialMediaFeed/>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import { jQueryMixin } from '../../main';
    import { mapActions } from 'vuex';
    import Content from '../AboutMe/Content';
    import SocialMediaFeed from '../../Common/SocialMediaFeed';

    export default {
        components: { SocialMediaFeed, Content, Footer },
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
                    await this.getPageConfig('home_page')
                ]).then(() => {
                    jQueryMixin.method.loadSticky();
                    jQueryMixin.method.loadSearch();
                    jQueryMixin.method.loadOwlCarousel();
                    jQueryMixin.method.removeLoader();
                })
            }
        }
    }
</script>
