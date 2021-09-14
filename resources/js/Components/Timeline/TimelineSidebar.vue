<template>
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
        <div class="blog-sidebar">
            <SidebarSearch/>
            <div class="single-sidebar-widget">
                <Adsense
                    :data-ad-client="ENV_.DATA_AD.SQUARE_DISPLAY.CLIENT"
                    :data-ad-slot="ENV_.DATA_AD.SQUARE_DISPLAY.SLOT">
                </Adsense>
            </div>
            <SidebarTopRecipes/>
            <ConnectWithMe/>
        </div>
    </div>
</template>

<script>
    import ConnectWithMe from '../../Common/ConnectWithMe';
    import SidebarSearch from '../../Common/SidebarSearch';
    import SidebarTopRecipes from '../../Common/SidebarTopRecipes';

    export default {
        name: 'TimelineSidebar',
        components: { SidebarTopRecipes, SidebarSearch, ConnectWithMe }
    }
</script>
