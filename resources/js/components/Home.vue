<template>
    <div>
        <h2>{{welcome}}</h2>
        <ul class="nav mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  s4 tablink w3-padding-large w3-hover-red active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Salate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link s4 tablink w3-padding-large w3-hover-red" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pizza</a>
            </li>
            <li class="nav-item">
                <a class="nav-link s4 tablink w3-padding-large w3-hover-red" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Starter</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <Tab/>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <h2>alt tab</h2>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <h2>alt tab</h2>
            </div>
        </div>
    </div>

</template>

<script>
import Tab from './Tab.vue';
export default {
    name: "Home",
    computed: {
        welcome() {
            return this.$store.getters.welcome
        },
    },
    components: {
        Tab
    }
}
</script>

<style scoped>

</style>
