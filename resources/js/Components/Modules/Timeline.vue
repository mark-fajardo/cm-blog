<template>
    <section>
        <section class="blog-page blog-area section-padding">
            <div class="container">
                <div class="row">
                    <Content/>
                    <TimelineSidebar/>
                </div>
            </div>
        </section>
        <Promotions/>
        <SocialMediaFeed/>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import { jQueryMixin } from '../../main';
    import SocialMediaFeed from '../../Common/SocialMediaFeed';
    import Content from '../../Components/Timeline/Content';
    import TimelineSidebar from '../Timeline/TimelineSidebar';
    import Promotions from '../Home/Promotions';

    export default {
        components: { Promotions, TimelineSidebar, SocialMediaFeed, Footer, Content },
        async created() {
            jQueryMixin.method.loadSticky();
            jQueryMixin.method.loadSearch();
            jQueryMixin.method.removeLoader();
        }
    }
</script>
