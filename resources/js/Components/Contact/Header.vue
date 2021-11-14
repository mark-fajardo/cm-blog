<template>
    <header class="top-area single-page contact-us-page" id="home">
        <div class="page-barner-bg" :style="'background: rgba(0, 0, 0, 0) url(\'' + this.header_img + '\') no-repeat scroll center center / cover'"></div>
        <Nav/>
        <PageBanner banner-for="contact"/>
    </header>
</template>

<script>
    import Nav from '../../Common/Nav';
    import PageBanner from '../../Common/PageBanner';
    import { mapGetters } from 'vuex';

    export default {
        name: 'Header',
        computed: {
            ...mapGetters('PageConfig', ['header_img']),
        },
        components: { PageBanner, Nav }
    }
</script>
