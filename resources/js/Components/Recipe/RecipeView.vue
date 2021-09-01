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
                                <h3><a :href="'/recipe/' + recipe.slug_name">{{ recipe.recipe_name }}</a></h3>
                                <p class="post-meta">By <a>Chef Morris Danzen</a> | <a>{{ convertDateTime(recipe.created_at) }}</a></p>
                            </div>
                            <div class="blog-content">
                                <p class="short-description">{{ recipe.short_description }}</p>
                                <p>{{ recipe.description }}</p>
                                <h4>Ingredients</h4>
                                <p> Ingredients Here </p>
                                <h4>Procedure</h4>
                                <p v-html="recipe.procedure"></p>
                            </div>
                        </div>
                    </div>
                    <div class="tags-and-social-bar wow fadeIn">
                        <div class="tags">
                            <h3>TAGS:</h3>
                            <ul>
                                <li v-for="category in recipeCategories"><a>{{ getDefaultValue(categories[category].category_name) }}</a></li>
                            </ul>
                        </div>
                        <div class="single-post-social-bar text-right">
                            <h3>SHARE:</h3>
                            <ul>
                                <li v-for="network in share_network">
                                    <a>
                                        <ShareNetwork
                                            :network="network.network"
                                            :url="getCurrentHREF()"
                                            :title="recipe.recipe_name"
                                            :description="recipe.short_description"
                                            :quote="'This is the ' + recipe.recipe_name + ' recipe. Learn this new and easy recipe right now. Just click the recipe link below. Happy cooking!'"
                                            hashtags="ChefMorrisDanzen">
                                            <i :class="network.icon"></i>
                                        </ShareNetwork>
                                    </a>
                                </li>
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
    import { jQueryMixin } from '../../main';

    export default {
        name: 'RecipeView',
        components: { RecipeViewSideBar },
        data() {
            return {
                share_network: [
                    {
                        network: 'facebook',
                        icon: 'fa fa-facebook'
                    },
                    {
                        network: 'twitter',
                        icon: 'fa fa-twitter'
                    },
                    {
                        network: 'telegram',
                        icon: 'fa fa-telegram'
                    },
                    {
                        network: 'whatsapp',
                        icon: 'fa fa-whatsapp'
                    },
                    {
                        network: 'sms',
                        icon: 'fa fa-comment'
                    },
                ]
            };
        },
        computed: {
            ...mapGetters('Recipe', ['recipe']),
            ...mapGetters('Category', ['categories']),

            /**
             * Contains recipe categories.
             */
            recipeCategories() {
                return this.recipe.category_json;
            },
        },
        mounted() {
            jQueryMixin.method.loadOwlCarousel();
        }
    }
</script>
