<template>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <router-link class="navbar-brand" to="/">Page</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <template>
                        <li class="nav-item">
                            <router-link to="/contact" class="w3-bar-item w3-button active">Contact</router-link>
                        </li>
                        <li>
                            <router-link to="/" class="w3-bar-item w3-button">Home</router-link>
                        </li>
                        <li>
                            <router-link to="/about" class="w3-bar-item w3-button">About</router-link>
                        </li>
                        <template v-if="!currentUser">
                            <li>
                                <router-link to="/login" class="w3-bar-item w3-button">Login</router-link>
                            </li>
                            <li>
                                <router-link to="/register" class="w3-bar-item w3-button">Register</router-link>
                            </li>
                        </template>
                        <template v-else>
                            <li>
                                <router-link to="/list" class="w3-bar-item w3-button">Customers</router-link>
                            </li>
                            <li>
                                <a href="#!" class="w3-bar-item w3-button" @click.prevent="logout">Logout</a>
                            </li>
                        </template>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>

export default {
    name: 'Header',
    methods: {
        logout() {
            this.$store.commit('logout');
            this.$router.push('login');
        }
    },
    computed: {
        currentUser() {
            return this.$store.getters.currentUser;
        }
    }
}
</script>
