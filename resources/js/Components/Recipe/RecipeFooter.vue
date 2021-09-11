<template>
    <div class="tags-and-social-bar wow fadeIn">
        <div class="tags">
            <h3>TAGS:</h3>
            <ul>
                <li v-for="category in recipeCategories"><a>{{ getDefaultValue(categories.find(x => x.id === parseInt(category)).category_name) }}</a></li>
            </ul>
        </div>
        <div class="single-post-social-bar text-right">
            <h3>SHARE:</h3>
            <ul>
                <li v-for="network in share_network" v-show="network.mobile_only === false">
                    <a>
                        <ShareNetwork
                            :network="network.network"
                            :url="getCurrentHREF()"
                            :title="recipe.recipe_name"
                            :description="recipe.short_description"
                            :quote="'This is the ' + recipe.recipe_name + ' recipe. Learn this new and easy recipe right now. Just click the recipe link below. Happy cooking!'"
                            :media="recipe.main_image"
                            hashtags="ChefMorrisDanzen">
                            <i :class="network.icon"></i>
                        </ShareNetwork>
                    </a>
                </li>
                <li v-for="network in share_network" v-show="network.mobile_only === true && isMobile === true">
                    <a>
                        <ShareNetwork
                            :network="network.network"
                            :url="getCurrentHREF()"
                            :title="recipe.recipe_name"
                            :description="recipe.short_description"
                            :quote="'This is the ' + recipe.recipe_name + ' recipe. Learn this new and easy recipe right now. Just click the recipe link below. Happy cooking!'"
                            :media="recipe.main_image"
                            hashtags="ChefMorrisDanzen">
                            <i :class="network.icon"></i>
                        </ShareNetwork>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { detectPlatformMixin } from '../../detectPlatformMixin';

    export default {
        name: 'RecipeFooter',
        data() {
            return {
                share_network: [
                    {
                        network: 'facebook',
                        icon: 'fa fa-facebook',
                        mobile_only: false
                    },
                    {
                        network: 'pinterest',
                        icon: 'fa fa-pinterest',
                        mobile_only: false
                    },
                    {
                        network: 'twitter',
                        icon: 'fa fa-twitter',
                        mobile_only: false
                    },
                    {
                        network: 'telegram',
                        icon: 'fa fa-telegram',
                        mobile_only: false
                    },
                    {
                        network: 'whatsapp',
                        icon: 'fa fa-whatsapp',
                        mobile_only: false
                    },
                    {
                        network: 'sms',
                        icon: 'fa fa-comment',
                        mobile_only: true
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
        mixins: [ detectPlatformMixin ]
    }
</script>
