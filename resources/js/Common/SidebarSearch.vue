<template>
    <div class="single-sidebar-widget">
        <form action="/recipe-list?#search-results-area">
            <input type="search" name="search" id="search" placeholder="Search..." autocomplete="off">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'SidebarSearch'
    }
</script>
