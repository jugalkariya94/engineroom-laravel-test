<template>
    <div>
        <div id="nav">
            <router-link to="/">Home</router-link> |
            <router-link to="/add" v-if="isLogged">Add Contact</router-link>
            <router-link to="/login" v-else>Login</router-link>
            <button type="button" @click="logout()" v-if="isLogged">
                Logout
            </button>


        </div>
        <router-view/>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
    computed: {
        ...mapGetters([
            'isLogged'
        ])
    },

    methods: {
        logout () {
            this.$store.dispatch('logout')
        }
    }
}
</script>
