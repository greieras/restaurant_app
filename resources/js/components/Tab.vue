<template>
    <div class="row">
        <div class="col-md-6">
        <template v-if="!recipes.length">
            <tr>
                <td colspan="4" class="text-center">No customer available</td>
            </tr>
        </template>
        <template v-else>
            <tr v-for="(recipe, index) in recipes" :key="index">
                <h1><b>{{ recipe.name }}</b> <span class="w3-right w3-tag w3-dark-grey w3-round">${{recipe.price}}</span></h1>
                <p class="w3-text-grey">{{recipe.description}}</p>
                <button>
                    <span v-on:click="decrement(index)">-</span>
                    <span v-on:click="increment(recipe.ID)">+</span>
                </button>
                <hr>
                <td><router-link :to="`recipes/${recipe.ID}`">View</router-link></td>
            </tr>
        </template>
        </div>
        <div class="col-md-4">
        <template v-if="order">
            <div class="container">
                <div class="row">
                    <h2>Cart</h2>
                </div>
                <div class="row">
                    <tr v-for="(product, index) in cart" :key="index">
                        <h1><b>{{ product.name }}</b> <span class="w3-right w3-tag w3-dark-grey w3-round">${{product.price}}</span></h1>
                        <p class="w3-text-grey">{{product.description}}</p>
                        {{product.price }} x {{ product.quantity }} = {{ product.price  * product.quantity }}
                        <hr>

                    </tr>
                </div>
            </div>
        </template>
        </div>
    </div>
</template>

<script>
export default {
    name: "Tab",
    data() {
        return {
            cart: [],
            order: false
        }
    },
    methods: {
        increment: function (id) {
            let cart = {id: id};
            axios.post('/api/cart', cart)
                .then((response) => {
                    this.order = true;
                    this.cart = response.data.cart;
                    this.quantity = 1;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        decrement(){
            if(this.quantity > 0){
                this.quantity--;
            } else {
                this.order = false;
            }
        }
    },
    mounted() {
        this.$store.dispatch('getRecipes');
    },
    computed: {
        recipes(){
            return this.$store.getters.recipes;
        }
    }
}
</script>

<style scoped>

</style>
