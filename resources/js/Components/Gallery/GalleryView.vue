<template>
    <section id="gallery-container" class="style-two menus-area section-padding">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Recipe Gallery</h2>
                        <h3>Recipe Images Gallery of Chef Morris Danzen</h3>
                    </div>
                </div>
            </div>
            <div class="row food-menu-list">
                <div v-lazy-container="{ selector: 'img' }">
                    <img class="image" v-for="(image, i) in images" :data-src="image" @click="index = i">
                </div>
                <VueGallerySlideshow :images="images" :index="index" @close="index = null"></VueGallerySlideshow>
            </div>
            <div class="row" v-if="areImagesAvailable === false">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h4>Currently, there are no gallery images saved.</h4>
                    </div>
                </div>
            </div>
            <div class="row read-more-area" v-if="hide_load_more === false">
                <a @click="prepareData" class="read-more">Load more</a>
            </div>
        </div>
    </section>
</template>

<script>
    import VueGallerySlideshow from 'vue-gallery-slideshow';
    import { mapActions, mapGetters, mapMutations} from 'vuex';

    export default {
        name: 'GalleryView',
        components: { VueGallerySlideshow },
        data() {
            return {
                images: [],
                index: null,
                hide_load_more: false
            };
        },
        computed: {
            ...mapGetters('Gallery', ['images_only', 'offset']),

            /**
             * Return true if images are available.
             * @returns {boolean}
             */
            areImagesAvailable() {
                return (this.$_.isEmpty(this.images) === false);
            }
        },
        mounted() {
            this.prepareData();
        },
        methods: {
            ...mapActions('Gallery', ['getGalleryImages']),

            /**
             * Prepare data for the components config.
             */
            async prepareData() {
                Promise.all([
                    await this.getGalleryImages()
                ]).then(() => {
                    if (this.$_.isEmpty(this.images_only) === false) {
                        this.images = [...this.images, ...this.images_only];
                    } else {
                        this.hide_load_more = true;
                    }
                });
            }
        }
    }
</script>

<style scoped>
    .image {
        width: 300px;
        height: 300px;
        background-size: cover;
        cursor: pointer;
        margin: 15px;
        object-fit: cover;
    }

    .food-menu-list, .read-more-area {
        margin: auto;
        text-align: center;
    }

    .read-more-area .read-more {
        font-family: "Open Sans", sans serif;
        margin-top: 70px;
        cursor: pointer;
    }

    .read-more-area .read-more:hover {
        color: white;
    }
</style>
