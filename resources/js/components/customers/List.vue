<template>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <template v-if="!customers.length">
                <tr>
                    <td colspan="4" class="text-center">No customer available</td>
                </tr>
            </template>
            <template v-else>
                <tr v-for="customer in customers" :key="customer.id">
                    <td>{{ customer.id }}</td>
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.phone }}</td>
                    <td><router-link :to="`customer/${customer.id}`">View</router-link></td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "List",
    mounted() {
        this.$store.dispatch('getCustomers');
    },
    computed: {
        customers(){
            return this.$store.getters.customers;
        }
    }
}
</script>

<style scoped>

</style>
