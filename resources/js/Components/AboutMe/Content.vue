<template>
    <section>
        <MiniAbout :preview="false"/>
        <MissionVision/>
    </section>
</template>

<script>
    import MiniAbout from '../Home/MiniAbout';
    import CounterArea from './CounterArea';
    import MissionVision from  './MissionVision';

    export default {
        name: 'Content',
        components: { MissionVision, CounterArea, MiniAbout }
    }
</script>
