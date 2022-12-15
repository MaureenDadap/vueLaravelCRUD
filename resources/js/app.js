import './bootstrap'
import App from './App.vue';
import { createApp } from 'vue'
import router from './routes/route'

import VueAxios from 'vue-axios';
import axios from 'axios';

import 'primeicons/primeicons.css';

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

import { TailwindPagination } from 'laravel-vue-pagination';

import '../css/app.css';

const app = createApp(App);

app.use(router)
app.use(VueAxios, axios)
app.component('TailwindPagination', TailwindPagination)

app.component('v-select', vSelect)
app.mount('#app')