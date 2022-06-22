    

require('./bootstrap');


import { createApp } from 'vue';
import router from './router'
import DashboardIndex from './views/Dashboard';

import 'nprogress/nprogress.css'

import SoglasjeIndex from './views/SoglasjeForm';


createApp({
    components: {
        DashboardIndex,
        SoglasjeIndex,

    }
}).use(router).mount('#app');




import App from './App.vue'

const app = createApp({});


// app.component('soglasje-form', App)
//     .mount('#app');

