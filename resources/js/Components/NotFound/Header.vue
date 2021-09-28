<template>
    <header class="top-area single-page error-page" id="home">
        <div class="page-barner-bg"></div>
        <Nav/>
        <PageBanner banner-for="not_found"/>
    </header>
</template>

<script>
    import Nav from '../../Common/Nav';
    import SliderArea from '../Home/SliderArea';
    import PageBanner from '../../Common/PageBanner';

    export default {
        name: 'Header',
        components: { PageBanner, SliderArea, Nav }
    }
</script>
