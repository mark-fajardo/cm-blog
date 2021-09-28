<template>
    <section class="instagram-area section-padding">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h4>Follow me on Instagram <a href="//www.instagram.com/chef_morrisdanzen/" target="_blank" rel="noopener noreferrer">@chef_morrisdanzen</a></h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="instagram-feed-content text-center">
                        <ul class="instagram-feed"></ul>
                    </div>
                </div>
            </div>
            <div class="row">
<!--                <Adsense-->
<!--                    :data-ad-client="ENV_.DATA_AD.HORIZONTAL_DISPLAY.CLIENT"-->
<!--                    :data-ad-slot="ENV_.DATA_AD.HORIZONTAL_DISPLAY.SLOT">-->
<!--                </Adsense>-->
            </div>
        </div>
    </section>
</template>

<script>
    import VueInstagram from 'vue-instagram'

    export default {
        name: 'SocialMediaFeed',
        components: {
            VueInstagram
        }
    }
</script>

<style scoped>
    .instagram-area {
        background-color: #FFFFFF;
    }
</style>
