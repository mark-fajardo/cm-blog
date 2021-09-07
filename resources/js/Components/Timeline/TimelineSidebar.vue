<template>
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
        <div class="blog-sidebar">
            <SidebarSearch/>
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
