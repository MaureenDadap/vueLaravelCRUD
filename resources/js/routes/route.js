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
            name: 'books',
            path: '/books',
            component: BooksComponent
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
        {
            name: 'delete-book',
            path: '/book/delete/:id',
            component: EditBookComponent //todo: change component
        }
    ]
});

export default router;