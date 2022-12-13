import { createRouter, createWebHistory } from 'vue-router';

import CreateBookComponent from '../components/CreateBookComponent.vue';
import BooksComponent from '../components/BooksComponent.vue';
import ViewBookComponent from '../components/ViewBookComponent.vue';
import EditBookComponent from '../components/EditBookComponent.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'home',
            path: '/',
            component: BooksComponent
        },
        {
            name: 'new-book',
            path: '/book/create',
            component: CreateBookComponent
        },
        {
            name: 'view-book',
            path: '/book/view/:id',
            component: ViewBookComponent
        },
        {
            name: 'edit-book',
            path: '/book/edit/:id',
            component: EditBookComponent
        },
    ]
});

export default router;