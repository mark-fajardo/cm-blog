<template>
    <header class="top-area" id="home">
        <Nav/>
        <SliderArea/>
    </header>
</template>

<script>
    import Nav from '../../Common/Nav';
    import SliderArea from '../Home/SliderArea';

    export default {
        name: 'Header',
        components: { SliderArea, Nav }
    }
</script>
