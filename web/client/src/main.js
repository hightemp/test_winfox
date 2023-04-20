import { createApp } from 'vue'
import App from './App.vue'

import 'bootstrap/dist/css/bootstrap.min.css'

import * as VueRouter from 'vue-router'

import Index from './components/Index'
import ContactForm from './components/ContactForm'

const routes = [
    { path: '/', component: Index },
    { path: '/form', component: ContactForm }
]

const router = new VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes
})

createApp(App).use(router).mount('#app')
