import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import routes from "./routes";
import AllContacts from "../view/Contacts/All";
import Login from "../view/Auth/Login";

const router = new Router({
    mode: 'history', // https://router.vuejs.org/api/#mode
    scrollBehavior: () => ({ y: 0 }),
    routes:  routes
})

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')
    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
        next('/login')
        return
    }
    next()
})

export default router
