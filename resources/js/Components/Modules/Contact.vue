<template>
    <section>
        <section class="contact-area section-padding">
            <div class="container wow fadeIn">
                <ContactDetails/>
                <ContactFormHeader/>
                <Content/>
            </div>
        </section>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import { jQueryMixin } from '../../main';
    import Content from '../Contact/Content';
    import ContactDetails from '../Contact/ContactDetails';
    import ContactFormHeader from '../Contact/ContactFormHeader';
    import { mapActions } from 'vuex';
    import { PageTags } from '../../constants';

    export default {
        components: { ContactFormHeader, ContactDetails, Content, Footer },
        async created() {
            jQueryMixin.method.loadSticky();
            jQueryMixin.method.loadSearch();
            jQueryMixin.method.removeLoader();
            await this.getPageConfig(PageTags.CONTACT);
        },
        methods: {
            ...mapActions('PageConfig', {
                getPageConfig: 'getPageConfig'
            }),
        }
    }
</script>
