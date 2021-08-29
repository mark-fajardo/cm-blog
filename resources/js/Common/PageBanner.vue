<template>
    <div class="page-barner-area">
        <div class="container wow fadeIn" v-show="BannerFor === 'not_found'">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="barner-text">
                        <h1><span>404</span> Error</h1>
                        <ul class="page-location">
                            <li><a href="index.html">Home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li class="active"><a href="404.html">404 Error</a></li>
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
            }
        }
    }
</script>
