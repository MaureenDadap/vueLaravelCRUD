import './bootstrap'
import App from './App.vue';
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

import PrimeVue from 'primevue/config';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

import HomeComponent from './components/HomeComponent.vue';
import CreateBookComponent from './components/CreateBookComponent.vue';
import CreateAuthorComponent from './components/CreateAuthorComponent.vue';
import BookComponent from './components/BookComponent.vue';
import EditComponent from './components/EditComponent.vue';

import '../css/app.css';

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'new-book',
        path: '/new-book',
        component: CreateBookComponent
    },
    {
        name: 'new-author',
        path: '/new-author',
        component: CreateAuthorComponent
    },
    {
        name: 'books',
        path: '/books',
        component: BookComponent
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
app.use(VueAxios, axios)
app.use(PrimeVue);
app.mount('#app');