<template>
    <section class="menus-area section-padding" id="menu">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Recipe List</h2>
                        <h3>New and Recommended Recipes</h3>
                    </div>
                </div>
            </div>
            <div class="row food-menu-list">
                <div v-for="recipe in recipe_list" class="mix col-md-3 col-lg-3 col-sm-6 col-xs-12 single-menu">
                    <div class="food-menu-img-container">
                        <div class="food-menu-img">
                            <a :href="recipe.img" class="menu-popup" data-effect="mfp-zoom-out"><img :src="recipe.img" alt="Can't load image"></a>
                        </div>
                    </div>
                    <div class="food-menu-details">
                        <h4>{{ recipe.name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'RecipeList',
        data() {
            return {
                recipe_list: [
                    {
                        name: 'Seafood in Coconut Milk Pasta Square',
                        img: 'img/chef_morris/seafood_in_coconut_milk_pasta_square.jpg'
                    },
                    {
                        name: 'No Flour Chocolate Cake',
                        img: 'img/chef_morris/no_flour_chocolate_cake_square.jpg'
                    },
                    {
                        name: 'Tiramisu',
                        img: 'img/chef_morris/tiramisu_2_landscape.jpg'
                    },
                    {
                        name: 'Seafood in Coconut Milk Pasta Square',
                        img: 'img/chef_morris/seafood_in_coconut_milk_pasta_square.jpg'
                    },
                    {
                        name: 'No Flour Chocolate Cake',
                        img: 'img/chef_morris/no_flour_chocolate_cake_square.jpg'
                    },
                    {
                        name: 'Tiramisu',
                        img: 'img/chef_morris/tiramisu_2_landscape.jpg'
                    },
                    {
                        name: 'Seafood in Coconut Milk Pasta Square',
                        img: 'img/chef_morris/seafood_in_coconut_milk_pasta_square.jpg'
                    },
                    {
                        name: 'No Flour Chocolate Cake',
                        img: 'img/chef_morris/no_flour_chocolate_cake_square.jpg'
                    }
                ]
            };
        }
    }
</script>

<style scoped>
    .menus-area {
        background-color: #FFF;
    }

    .food-menu-img {
        overflow: hidden;
    }

    .food-menu-img img {
        height: 100%;
    }

    .food-menu-img-container {
        min-height: 262.5px;
    }
</style>
