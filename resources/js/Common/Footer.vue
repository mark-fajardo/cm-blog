<template>
    <div class="footer-area">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="footer-top section-padding text-center">
                        <div class="footer-logo">
                            <a :href="main_menu[0].REDIRECT"><img src="" alt="Logo Here"></a>
                        </div>
                        <div class="footer-address">
                            <p>Sciacca, Italy</p>
                            <p><a href="mailto:chefmorrisdanzen@gmail.com">chefmorrisdanzen@gmail.com</a></p>
                            <p><a>+39 351 267 1387</a></p>
                        </div>
                        <div class="footer-social-bookmark">
                            <ul>
                                <li><a href="//www.youtube.com/Chef%20Morris%20Danzen" target="_blank" rel="noopener noreferrer"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="//www.facebook.com/Chefmorrisdanzen" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="//api.whatsapp.com/send?phone=393512671387" target="_blank" rel="noopener noreferrer"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="//www.instagram.com/chef_morrisdanzen/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a v-for="menu in main_menu" :href="menu.REDIRECT">{{ menu.NAME }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="footer-copyright">
                        <p>Copyright &copy; <a>WeCreate IT Solutions</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { MainMenu } from '../constants';

    export default {
        name: 'Footer',
        data() {
            return {
                main_menu: MainMenu
            };
        }
    }
</script>
