<template>
    <section>
        <Content/>
        <Footer/>
    </section>
</template>

<script>
    import Footer from '../../Common/Footer';
    import Vlogs from '../../Common/Vlogs';
    import { jQueryMixin } from '../../main';
    import Content from '../NotFound/Content';

    export default {
        components: { Content, Vlogs, Footer },
        async created() {
            await this.prepareData();
        },
        methods: {
            /**
             * Prepare data for the components config.
             */
            async prepareData() {
                jQueryMixin.method.removeLoader();
                jQueryMixin.method.loadSticky();
                jQueryMixin.method.loadSearch();
            }
        }
    }
</script>
