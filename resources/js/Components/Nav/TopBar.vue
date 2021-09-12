<template>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-6 col-sm-8">
                    <div class="call-to-action">
                        <p><i class="fa fa-envelope-o"></i><a href="mailto:chefmorrisdanzen@gmail.com">chefmorrisdanzen@gmail.com</a></p>
                        <p><i class="fa fa-phone"></i><a>+39 351 267 1387</a></p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-6 col-sm-4">
                    <div class="book-table-popup">
                        <a :href="sContactHref">Contact Me</a>
                    </div>
                    <div class="top-social-bookmark">
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
    </div>
</template>

<script>
    import { MainMenu } from '../../constants';

    export default {
        name: 'TopBar',
        data() {
            return {
                sContactHref: MainMenu[5].REDIRECT
            };
        }
    }
</script>
