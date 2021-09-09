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
    import ContactMaps from '../Contact/ContactMaps';

    export default {
        components: { ContactMaps, ContactFormHeader, ContactDetails, Content, Footer },
        async created() {
            jQueryMixin.method.loadSticky();
            jQueryMixin.method.loadSearch();
            jQueryMixin.method.removeLoader();
        }
    }
</script>
