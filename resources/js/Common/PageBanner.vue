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
                        title: '<span>404</span> Error',
                        breadcrumb_title: '404 Error',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    recipe_list: {
                        title: 'Recipe <span>List</span>',
                        breadcrumb_title: 'Recipe List',
                        breadcrumb_href: this.currentEndpoint,
                    },
                    recipe: {
                        title: 'Recipe <span>Details</span>',
                        breadcrumb_title: 'Recipe Details',
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
