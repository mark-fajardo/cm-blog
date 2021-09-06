<template>
    <header class="top-area single-page gallery-page" id="home">
        <div class="page-barner-bg"></div>
        <Nav/>
        <PageBanner banner-for="gallery"/>
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
