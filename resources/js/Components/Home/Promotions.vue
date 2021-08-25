<template>
    <section class="promotions-area section-padding">
        <div class="promotion-area-bg">
            <div class="video-background">
                <div class="video-foreground">
                    <iframe :src="'//www.youtube.com/embed/' + promotion.youtube_video_id + '?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1&playlist=' + promotion.youtube_video_id" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Recipe of the Month</h2>
                        <h3>Special Promotion</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <div class="single-promotions text-center">
                            <div class="promotions-img">
                                <img :src="promotion.href" alt="">
                            </div>
                            <div class="promotions-details">
                                <h4>{{ promotion.title }}</h4>
                                <a href="#" class="read-more">Check recipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'Promotions',
        data() {
            return {
                promotion: {
                    title: 'Stir Fried Prawns in Oyster Sauce',
                    href: 'img/chef_morris/stir_fried_prawns_screenshot_landscape.jpg',
                    youtube_video_id: '2qnGGVH8uSU'
                }
            };
        }
    }
</script>

<style scoped>
    * { box-sizing: border-box; }
    .video-background {
        background: #000;
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        z-index: -99;
    }
    .video-foreground,
    .video-background iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    @media (min-aspect-ratio: 16/9) {
        .video-foreground { height: 300%; top: -100%; }
    }
    @media (max-aspect-ratio: 16/9) {
        .video-foreground { width: 300%; left: -100%; }
    }
    @media all and (max-width: 600px) {
        .vid-info { width: 50%; padding: .5rem; }
        .vid-info h1 { margin-bottom: .2rem; }
    }
    @media all and (max-width: 500px) {
        .vid-info .acronym { display: none; }
    }

    .promotions-img {
        width: 370px;
        margin: 0 auto;
    }
    .promotions-details {
        margin-top: 40px;
    }
</style>
