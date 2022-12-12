import './bootstrap'
import App from './App.vue';
import { createApp } from 'vue'
import router  from './routes/route'

import VueAxios from 'vue-axios';
import axios from 'axios';

import PrimeVue from 'primevue/config';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';


import '../css/app.css';

const app = createApp(App);

app.use(router)
app.use(VueAxios, axios)
app.use(PrimeVue)
app.component('DataTable',DataTable)
app.component('Column',Column)
app.mount('#app')