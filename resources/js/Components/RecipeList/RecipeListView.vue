<template>
    <section id="search-results-area" class="style-two menus-area section-padding">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Recipes</h2>
                        <h3>New and Updated Recipes for you</h3>
                    </div>
                </div>
            </div>
            <div class="single-sidebar-widget">
                <form action="#search-results-area" @submit.prevent="searchRecipe()">
                    <input type="search" name="search" id="search" placeholder="Search..." v-model="search_keyword" autocomplete="off">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="row" v-show="areCategoriesAvailable === true">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="food-menu-list-menu">
                        <ul>
                            <li class="filter active" data-filter="all">All</li>
                            <li v-for="category in categories" class="filter" :data-filter="'.' + category.id">{{ category.category_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row food-menu-list" v-if="areRecipesAvailable === true">
                <div v-for="recipe in recipes" :class="'mix col-md-6 col-lg-6 col-sm-12 col-xs-12 single-menu ' + recipe.category_json.join(' ')">
                    <div class="single-menu-details">
                        <div class="food-menu-img">
                            <a :href="'/recipe/' + recipe.slug_name">
                                <img :src="recipe.main_image" alt="">
                            </a>
                        </div>
                        <div class="food-menu-details">
                            <h3>{{ recipe.recipe_name }} </h3>
                            <p class="menu-speacification"><span v-for="ingredient in recipe.ingredients_json">- {{ limitText(ingredient, 20) }} </span></p>
                            <br><a :href="'/recipe/' + recipe.slug_name"><span class="menu-price">View Recipe <i class="fa fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" v-else>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h4>There are no recipes matching the keyword.</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <ul class="page-pagination">
                        <li v-show="bShowPreviousBtn" @click="changePageGroup(current_page_group - 1)"><a><i class="fa fa-angle-left"></i></a></li>
                        <li :class="{ 'active' : iPage === current_page }" v-for="iPage in iPageCount" v-show="isPageGroupMember(iPage)">
                            <a @click="changePage(iPage)">{{ iPage }}</a>
                        </li>
                        <li v-show="bShowNextBtn" @click="changePageGroup(current_page_group + 1)"><a><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapActions, mapGetters, mapMutations } from 'vuex';
    import { jQueryMixin } from '../../main';

    export default {
        name: 'RecipeListView',
        data() {
            return {
                current_page: 1,
                current_page_group: 1,
                limit: 6,
                search_keyword: '',
            };
        },
        computed: {
            ...mapGetters('Recipe', ['recipe_count', 'recipes']),
            ...mapGetters('Category', ['categories']),

            /**
             * Check if recipes are available.
             * @returns {boolean}
             */
            areRecipesAvailable() {
                return (this.recipe_count > 0);
            },

            /**
             * Check if categories are available.
             * @returns {boolean}
             */
            areCategoriesAvailable() {
                return (Object.keys(this.categories).length > 0);
            },

            /**
             * Returns if previous btn is necessary.
             * @returns {boolean}
             */
            bShowPreviousBtn() {
                return (this.current_page_group > 1);
            },

            /**
             * Returns if previous btn is necessary.
             * @returns {boolean}
             */
            bShowNextBtn() {
                return (this.iPageGroup > this.current_page_group);
            },

            /**
             * Returns total page count.
             * @returns {number}
             */
            iPageCount() {
                return Math.ceil(this.recipe_count / this.limit);
            },

            /**
             * Total number of page groups.
             * @returns {number}
             */
            iPageGroup() {
                return Math.ceil(this.iPageCount / 10);
            },

            /**
             * Total number of max pages per group.
             * @returns {number}
             */
            iMaxPage() {
                return Math.ceil(this.current_page / 10) * 10;
            },

            /**
             * Total number of min pages per group.
             * @returns {number}
             */
            iMinPage() {
                return this.iMaxPage - 9;
            }
        },
        methods: {
            ...mapActions('Recipe', ['getRecipeCount', 'getRecipe']),
            ...mapActions('Category', ['getAllCategories']),
            ...mapMutations('Recipe', {
                'setOffset': 'SET_OFFSET',
                'setSearchKeyword': 'SET_SEARCH_KEYWORD',
            }),

            /**
             * Prepare data for the recipe list view.
             */
            prepareData() {
                Promise.all([
                    jQueryMixin.method.destroyMixItUp(),
                    this.getAllCategories(),
                    this.getRecipeCount(),
                    this.getRecipe(),
                ]).then(() => {
                    jQueryMixin.method.loadMixItUp();
                });
            },

            /**
             * Search recipe by search keyword.
             */
            searchRecipe() {
                this.setSearchKeyword(this.search_keyword);
                this.prepareData();
            },

            /**
             * Parse search keyword.
             */
            parseSearchKeyword() {
                let query_params = window.location.search.match(/(\?|&)search\=([^&]*)/);
                if (this.$_.isEmpty(query_params) === false) {
                    this.search_keyword = decodeURIComponent(query_params[2]);
                    this.search_keyword = this.search_keyword.replace('+', ' ');
                    this.setSearchKeyword(this.search_keyword);
                }
            },

            /**
             * Change current page.
             * @param iPage
             */
            changePage(iPage) {
                this.current_page = iPage;
                this.setOffset((iPage - 1) * this.limit);
                this.prepareData();
            },

            /**
             * Change current page group.
             * @param iPageGroup
             */
            changePageGroup(iPageGroup) {
                this.current_page_group = iPageGroup;
                this.changePage((iPageGroup * 10) - 9);
            },

            /**
             * Check if page is included in the current page group.
             * @param iPage
             * @returns {boolean}
             */
            isPageGroupMember(iPage) {
                return (iPage <= this.iMaxPage && iPage >= this.iMinPage);
            }
        },
        mounted() {
            this.parseSearchKeyword();
            this.prepareData();
        }
    }
</script>

<style scoped>
    .menu-price {
        font-size: 13px;
    }

    .page-pagination li {
        cursor: default;
    }

    .food-menu-img img {
        width: 100px;
        height: 100px;
        background-size: cover;
        cursor: pointer;
        margin: 5px;
        object-fit: cover;
    }
</style>
