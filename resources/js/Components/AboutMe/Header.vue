<template>
    <header class="top-area single-page about-page" id="home">
        <div class="page-barner-bg"></div>
        <Nav/>
        <PageBanner banner-for="about_me"/>
    </header>
</template>

<script>
    import Nav from '../../Common/Nav';
    import PageBanner from '../../Common/PageBanner';

    export default {
        name: 'Header',
        components: { PageBanner, Nav }
    }
</script>
