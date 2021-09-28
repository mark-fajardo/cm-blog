<template>
    <div class="header-top-area">
        <TopBar/>
        <MainMenu/>
    </div>
</template>

<script>
    import TopBar from '../Components/Nav/TopBar';
    import MainMenu from '../Components/Nav/MainMenu';

    export default {
        name: 'Nav',
        components: { MainMenu, TopBar }
    }
</script>
