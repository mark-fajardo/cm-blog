<template>
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
        <div class="blog-sidebar">
            <div class="single-sidebar-widget">
                <form action="/recipe-list?#search-results-area">
                    <input type="search" name="search" id="search" placeholder="Search..." autocomplete="off">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="single-sidebar-widget catagories-widget wow fadeIn">
                <h4>Catagories</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Business Agency</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Web Design</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Health</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Graphic Design</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Lifestyle</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>PSD Template</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Wordpress</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i>Photography</a></li>
                </ul>
            </div>
            <div class="single-sidebar-widget social-widget wow fadeIn">
                <h4>Connect With Us</h4>
                <ul>
                    <li class="s_facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="s_twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="s_youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li class="s_dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
            <div class="single-sidebar-widget post-widget wow fadeIn">
                <h4>Recent Blog Post</h4>
                <ul>
                    <li class="s_post">
                        <div class="post-tumb alignleft">
                            <a href="#"><img src="img/blog/thumb/1.jpg" alt=""></a>
                        </div>
                        <div class="post-title-and-date">
                            <h4><a href="#">Becoming a better life</a></h4>
                            <p class="post-meta"><a href="#">Mar 25, 2017</a></p>
                        </div>
                    </li>
                    <li class="s_post">
                        <div class="post-tumb alignleft">
                            <a href="#"><img src="img/blog/thumb/2.jpg" alt=""></a>
                        </div>
                        <div class="post-title-and-date">
                            <h4><a href="#">Do you know how make a pizza ?</a></h4>
                            <p class="post-meta"><a href="#">Jan 25, 2017</a></p>
                        </div>
                    </li>
                    <li class="s_post">
                        <div class="post-tumb alignleft">
                            <a href="#"><img src="img/blog/thumb/3.jpg" alt=""></a>
                        </div>
                        <div class="post-title-and-date">
                            <h4><a href="#">Why we provide best service ?</a></h4>
                            <p class="post-meta"><a href="#">Dec 25, 2017</a></p>
                        </div>
                    </li>
                    <li class="s_post">
                        <div class="post-tumb alignleft">
                            <a href="#"><img src="img/blog/thumb/4.jpg" alt=""></a>
                        </div>
                        <div class="post-title-and-date">
                            <h4><a href="#">How to make a our community member ?</a></h4>
                            <p class="post-meta"><a href="#">Nov 25, 2017</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="single-sidebar-widget tag-widget wow fadeIn">
                <h4>Blog Tags</h4>
                <ul>
                    <li><a href="#">Hermes</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Versace</a></li>
                    <li><a href="#">Zara</a></li>
                    <li><a href="#">Lacoste</a></li>
                    <li><a href="#">Chanel</a></li>
                    <li><a href="#">D&G</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'RecipeViewSideBar'
    }
</script>
