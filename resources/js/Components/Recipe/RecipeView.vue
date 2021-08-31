<template>
    <section class="blog-page blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                    <div class="single-blog-page single-blog text-justify wow fadeIn">
                        <div class="blog-image-sldie">
                            <!-- TODO: ADD MULTIPLE IMAGE FROM GALLERY TABLE -->
                            <img :src="recipe.main_image" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="title-and-meta">
                                <h3><a href="single-blog.html">{{ recipe.recipe_name }}</a></h3>
                                <p class="post-meta">By <a>Chef Morris Danzen</a> | <a>{{ convertDateTime(recipe.created_at) }}</a></p>
                            </div>
                            <div class="blog-content">
                                <p>{{ recipe.short_description }}</p>
                                <p>{{ recipe.description }}</p>
                                <p> Ingredients Here </p>
                                <p v-html="recipe.procedure"></p>
                            </div>
                        </div>
                    </div>
                    <div class="tags-and-social-bar wow fadeIn">
                        <div class="tags">
                            <h3>TAGS:</h3>
                            <ul>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Entertainment</a></li>
                                <li><a href="#">Fashion</a></li>
                            </ul>
                        </div>
                        <div class="single-post-social-bar text-right">
                            <h3>SHERE:</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <RecipeViewSideBar/>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapGetters } from 'vuex';
    import RecipeViewSideBar from './RecipeViewSideBar';

    export default {
        name: 'RecipeView',
        components: { RecipeViewSideBar },
        computed: {
            ...mapGetters('Recipe', ['recipe']),
            ...mapGetters('Category', ['categories']),
        },
        methods: {

            /**
             * Convert date time to readable date.
             * @param created_at
             * @returns {string}
             */
            convertDateTime(created_at) {
                let date_time_display = $moment(created_at).tz('UTC').format('LLLL');
                let splitted_date_time_display = date_time_display.split(' ');
                return splitted_date_time_display.join(' ');
            }
        }
    }
</script>
