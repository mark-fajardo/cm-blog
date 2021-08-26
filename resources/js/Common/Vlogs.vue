<template>
    <section class="blog-area section-padding">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="area-title text-center">
                        <h2>Cooking Vlogs</h2>
                        <h3>Cooking videos to help you</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-for="vlog in vlogs" class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="single-post text-center">
                        <div class="blog-post-img ">
                            <iframe width="560" height="315" :src="'//www.youtube.com/embed/' + vlog.youtube_video_id" :title="vlog.title" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="post-details">
                            <a :href="'//www.youtube.com/watch?v=' + vlog.youtube_video_id" class="post-meta-button" target="_blank" rel="noopener noreferrer">Watch on <i class="fa fa-youtube-play"></i>Youtube</a>
                            <h3><a :href="vlog.recipe_link" target="_blank" rel="noopener noreferrer">{{ vlog.title }}</a></h3>
                            <p class="post-meta"><a :href="vlog.recipe_link" target="_blank" rel="noopener noreferrer">{{ vlog.upload_date_time }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'Vlogs',
        data() {
            return {
                vlogs: [
                    {
                        title: 'Stir Fried Prawns in Oyster Sauce',
                        youtube_video_id: '2qnGGVH8uSU',
                        upload_date_time: '24 February, 2021',
                        recipe_link: '/stir-fried-prawns'
                    },
                    {
                        title: 'How To Cook Classic Carbonara',
                        youtube_video_id: 'yVthLJCq-J4',
                        upload_date_time: '24 February, 2021',
                        recipe_link: '/stir-fried-prawns'
                    },
                    {
                        title: 'Adobo sa GATA',
                        youtube_video_id: 'q5OKCzbPUZY',
                        upload_date_time: '24 February, 2021',
                        recipe_link: '/stir-fried-prawns'
                    },
                    {
                        title: 'Crispy Fried Chicken Thighs',
                        youtube_video_id: 'znLyc_-A4BE',
                        upload_date_time: '24 February, 2021',
                        recipe_link: '/stir-fried-prawns'
                    },
                ]
            };
        }
    }
</script>

<style scoped>
    .post-details {
        margin-top: 140px;
    }
</style>
