<template>
    <header class="top-area single-page single-blog-page" id="home">
        <div class="page-barner-bg" :style="'background: rgba(0, 0, 0, 0) url(\'' + this.recipe.main_image + '\') no-repeat scroll center center / cover'"></div>
        <Nav/>
        <PageBanner banner-for="recipe"/>
    </header>
</template>

<script>
    import Nav from '../../Common/Nav';
    import PageBanner from '../../Common/PageBanner';
    import { mapGetters } from 'vuex';

    export default {
        name: 'Header',
        components: { PageBanner, Nav },
        computed: {
            ...mapGetters('Recipe', ['recipe']),
        }
    }
</script>
