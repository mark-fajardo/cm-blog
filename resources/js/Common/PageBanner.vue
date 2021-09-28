<template>
    <div class="page-barner-area">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="barner-text">
                        <h1 v-html="(CustomTitle === '') ? banner_data[BannerFor].title : CustomTitle"></h1>
                        <ul class="page-location">
                            <li><a href="/">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li v-show="banner_data[BannerFor].breadcrumb_parent_1 !== ''"><a :href="banner_data[BannerFor].breadcrumb_parent_href_1">{{ banner_data[BannerFor].breadcrumb_parent_1 }}</a></li>
                            <li v-show="banner_data[BannerFor].breadcrumb_parent_1 !== ''"><i class="fa fa-angle-right"></i></li>
                            <li class="active"><a :href="banner_data[BannerFor].href">{{ (CustomBreadCrumb === '') ? banner_data[BannerFor].breadcrumb_title : CustomBreadCrumb }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PageBanner',
        props: {
            BannerFor: {
                type: String,
                required: true
            },
            CustomTitle: {
                type: String,
                default: '',
                required: false
            },
            CustomBreadCrumb: {
                type: String,
                default: '',
                required: false
            },
        },
        data() {
            return {
                banner_data: {
                    not_found: {
                        title: '<span>Page</span> Not Found',
                        breadcrumb_parent_1: '',
                        breadcrumb_parent_href_1: '',
                        breadcrumb_title: 'Page Not Found',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    recipe_list: {
                        title: '<span>Recipes</span>',
                        breadcrumb_parent_1: '',
                        breadcrumb_parent_href_1: '',
                        breadcrumb_title: 'Recipes',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    recipe: {
                        title: 'Recipe <span>Details</span>',
                        breadcrumb_parent_1: 'Recipes',
                        breadcrumb_parent_href_1: '/recipes',
                        breadcrumb_title: 'Recipe Details',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    gallery: {
                        title: 'Gallery <span></span>',
                        breadcrumb_parent_1: '',
                        breadcrumb_parent_href_1: '',
                        breadcrumb_title: 'Gallery',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    timeline: {
                        title: 'Recipe <span>Timeline</span>',
                        breadcrumb_parent_1: '',
                        breadcrumb_parent_href_1: '',
                        breadcrumb_title: 'Recipe Timeline',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    contact: {
                        title: 'Contact <span>Me</span>',
                        breadcrumb_parent_1: '',
                        breadcrumb_parent_href_1: '',
                        breadcrumb_title: 'Contact Me',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    about_me: {
                        title: 'About <span>Me</span>',
                        breadcrumb_parent_1: '',
                        breadcrumb_parent_href_1: '',
                        breadcrumb_title: 'About Me',
                        breadcrumb_href: this.currentEndpoint,
                    },
                }
            };
        },
        computed: {
            /**
             * Returns current endpoint.
             * @returns {string}
             */
            currentEndpoint() {
                let split_href = this.current_href.split('/');
                return '/' + split_href[split_href.length - 1];
            }
        }
    }
</script>
