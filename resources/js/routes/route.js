import { createRouter, createWebHistory } from 'vue-router';

import CreateBookComponent from '../components/CreateBookComponent.vue';
import CreateAuthorComponent from '../components/CreateAuthorComponent.vue';
import BooksComponent from '../components/BooksComponent.vue';
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
            name: 'new-author',
            path: '/new-author',
            component: CreateAuthorComponent
        },
        {
            name: 'books',
            path: '/books',
            component: BooksComponent
        },
        {
            name: 'edit-book',
            path: '/edit-book/:id',
            component: EditBookComponent
        }
    ]
});

export default router;