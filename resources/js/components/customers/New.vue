<template>
    <div class="container">
        <form @submit.prevent="save">
            <input type="text" v-model="customer.name">
        </form>
    </div>
</template>

<script>
export default {
    name: "New",
    data() {
        return {
            customer: {
                name: ''
            }
        }
    }
}
</script>

<style scoped>

</style>
