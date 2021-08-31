<template>
    <section class="about-area section-padding">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="area-title">
                        <h2><span>{{ mini_about.small_title }}</span> <br> <span class="area-title-mini-about-title">{{ mini_about.title }}</span></h2>
                    </div>
                    <div class="about-content">
                        <p>{{ mini_about.content }}</p>
                        <a :href="main_menu[1].REDIRECT" class="read-more">Read more</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="about-img">
                                <img :src="mini_about.img[0]" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                            <div class="about-img">
                                <img :src="mini_about.img[1]" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { MainMenu } from '../../constants';
    import { mapGetters } from 'vuex';

    export default {
        name: 'MiniAbout',
        computed: {
            ...mapGetters('PageConfig', ['mini_about']),
        },
        data() {
            return {
                main_menu: MainMenu
            };
        }
    }
</script>

<style scoped>
    .about-area {
        background-color: #FFF;
    }
    .area-title-mini-about-title {
        font-family: "Open Sans" !important;
        font-weight: 700 !important;
        font-size: 60px !important;
        color: #d0963e !important;
    }
</style>
