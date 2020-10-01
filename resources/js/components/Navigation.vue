<template>
    <div id="main">
        <Header/>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Header from './Header.vue';
export default {
    name: 'Navigation',
    components: {Header}
}
</script>
