<template>
    <section>
        <GalleryView/>
        <Promotions/>
        <SocialMediaFeed/>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import { jQueryMixin } from '../../main';
    import SocialMediaFeed from '../../Common/SocialMediaFeed';
    import GalleryView from '../Gallery/GalleryView';
    import Promotions from '../Home/Promotions';

    export default {
        components: { Promotions, GalleryView, SocialMediaFeed, Footer },
        async created() {
            jQueryMixin.method.loadSticky();
            jQueryMixin.method.loadSearch();
            jQueryMixin.method.removeLoader();
        }
    }
</script>
