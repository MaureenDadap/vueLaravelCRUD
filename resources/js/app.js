import './bootstrap'
import App from './App.vue';
import { createApp } from 'vue'
import router from './routes/route'

import VueAxios from 'vue-axios';
import axios from 'axios';

import PrimeVue from 'primevue/config';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primeicons/primeicons.css';

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

import '../css/app.css';

const app = createApp(App);

app.use(router)
app.use(VueAxios, axios)
app.use(PrimeVue)

app.component('v-select', vSelect)
app.component('DataTable', DataTable)
app.component('Column', Column)
app.mount('#app')