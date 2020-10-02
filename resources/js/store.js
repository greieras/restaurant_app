import { getLocalUser } from "./helpers/auth";
const user = getLocalUser();

export default {
    state: {
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
        customers: [],
        recipes: [],
        cart: [],
    },
    getters: {
        isLoading(state){
            return state.loading;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        currentUser(state) {
            return state.currentUser;
        },
        authError(state) {
            return state.auth_error;
        },
        customers(state) {
            return state.customers;
        },
        recipes(state) {
            return state.recipes;
        },
        cart(state) {
            return state.cart;
        }
    },
    mutations: {
        login(state) {
            state.loading = true;
            state.auth_error = null;
        },
        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },
        logout(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
        },
        updateCustomers(state, payload) {
            state.customers = payload;
        },
        updateCart(state, payload) {
            state.cart = payload;
        },
        updateRecipes(state, payload) {
            state.recipes = payload;
        }
    },
    actions: {
        login(context){
            context.commit("login");
        },
        getCustomers(context) {
            axios.get('/api/recipes/', {
                headers: {
                    "Authorization": `Bearer ${context.state.currentUser.token}`
                }
            }).then((response) => {
                context.commit('updateCustomers', response.data.recipes);
            });
        },
        getRecipes(context) {
            axios.get('/api/recipes/', {
                headers: {
                    "Authorization": `Bearer ${context.state.currentUser.token}`
                }
            }).then((response) => {
                context.commit('updateRecipes', response.data.recipes);
            });
        },
        updateCart(context) {
            axios.get('/api/cart/', {
                headers: {
                    "Authorization": `Bearer ${context.state.currentUser.token}`
                }
            }).then((response) => {
                context.commit('updateCart', response.data.cart);
            });
        }
    }
};
