<template>
    <section>
        <MiniAbout/>
        <Promotions/>
        <RecipeList/>
        <Vlogs/>
        <SocialMediaFeed/>
        <Footer/>
    </section>
</template>

<script>
    import MiniAbout from '../Home/MiniAbout';
    import Promotions from '../Home/Promotions';
    import RecipeList from '../Home/RecipeList';
    import Footer from '../../Common/Footer';
    import SocialMediaFeed from '../../Common/SocialMediaFeed';
    import Vlogs from '../../Common/Vlogs';

    export default {
        components: { Vlogs, SocialMediaFeed, Footer, RecipeList, Promotions, MiniAbout }
    }
</script>
