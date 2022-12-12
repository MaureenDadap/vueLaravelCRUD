import './bootstrap'
import { createApp } from 'vue'
import App from './App.vue';
// import VueAxios from 'vue-axios';
// import axios from 'axios';

import { createRouter, createWebHistory } from 'vue-router';

// Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import IndexComponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';

import '../css/app.css';

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'posts',
        path: '/posts',
        component: IndexComponent
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

const app = createApp(App);

app.use(router)
app.mount('#app');