import App from '../App.vue'

import Login from '../view/Auth/Login'

import AllContacts from '../view/Contacts/All'
import AddContact from "../view/Contacts/Add";


const routes = [{
    path: '/',
    component: App,
    children: [
        {
            path: '',
            name: 'home',
            redirect: '/all',
            meta: {
                auth: true
            }
        },
        {
            path: '/all',
            name: 'AllContacts',
            component: AllContacts,
            meta: {
                auth: true
            }
        },
        {
            path: '/add',
            name: 'AddContact',
            component: AddContact,
            meta: {
                auth: true
            }
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        }
    ]
}]

export default routes
