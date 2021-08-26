<template>
    <section class="about-area section-padding">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="area-title">
                        <h2><span>I'm</span> <br> Chef <span style="padding-left: 17px"></span> Morris Danzen</h2>
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

    export default {
        name: 'MiniAbout',
        data() {
            return {
                main_menu: MainMenu,
                mini_about: {
                    img: [
                        'img/chef_morris/profile_portrait.jpg',
                        'img/chef_morris/profile_2_portrait.jpg'
                    ],
                    content: 'A Filipino Chef in Italy sharing different recipes! From Italian and Filipino cuisine and many more! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.'
                }
            };
        }
    }
</script>

<style scoped>
    .about-area {
        background-color: #FFF;
    }
</style>
