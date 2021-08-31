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
        </div>
<!--        <VueInstagram :token="ENV_.IG_ACCESS_TOKEN" :count="5" :tags="['hashtag1', 'hashtag2']" mediaType="image">-->
<!--            <template v-slot:loading="props">-->
<!--                <h1 v-if="props.loading" class="fancy-loading">Loading, please wait...</h1>-->
<!--            </template>-->
<!--            <template v-slot:feeds="props">-->
<!--                <li class="fancy-list"> {{ props.feed.link }} </li>-->
<!--            </template>-->
<!--            <template v-slot:error="props">-->
<!--                <div class="fancy-alert"> {{ props.error.error_message }} </div>-->
<!--            </template>-->
<!--        </VueInstagram>-->
<!--        <Adsense-->
<!--            :data-ad-client="ENV_.DATA_AD.VERTICAL_DISPLAY.CLIENT"-->
<!--            :data-ad-slot="ENV_.DATA_AD.VERTICAL_DISPLAY.SLOT">-->
<!--        </Adsense>-->
<!--        <Adsense-->
<!--            :data-ad-client="ENV_.DATA_AD.SQUARE_DISPLAY.CLIENT"-->
<!--            :data-ad-slot="ENV_.DATA_AD.SQUARE_DISPLAY.SLOT">-->
<!--        </Adsense>-->
<!--        <Adsense-->
<!--            :data-ad-client="ENV_.DATA_AD.HORIZONTAL_DISPLAY.CLIENT"-->
<!--            :data-ad-slot="ENV_.DATA_AD.HORIZONTAL_DISPLAY.SLOT">-->
<!--        </Adsense>-->
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
