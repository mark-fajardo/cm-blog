<template>
    <iframe
        :width="Width"
        :height="Height"
        :src="'//www.youtube.com/embed/' + VideoId"
        :title="VideoTitle"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
    </iframe>
</template>

<script>
    export default {
        name: 'YoutubeVideoPlayer',
        props: {
            VideoId: {
                type: String,
                required: true
            },
            VideoTitle: {
                type: String,
                required: true
            },
            Autoplay: {
                type: Boolean,
                required: false
            },
            Width: {
                type: Number,
                default: 560,
                required: false
            },
            Height: {
                type: Number,
                default: 315,
                required: false
            }
        }
    }
</script>
