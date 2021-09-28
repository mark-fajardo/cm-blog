<template>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <GmapMap
                class="google-map"
                :center="{lat:10, lng:10}"
                :zoom="7"
                map-type-id="terrain"
                style="height:400px; width:100%;"
            >
            </GmapMap>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ContactMaps',
    }
</script>
