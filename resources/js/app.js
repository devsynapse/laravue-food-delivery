import './bootstrap';
import '../css/app.css';

import router from "./router";
import { createApp } from "vue";
import { createPinia } from 'pinia'

import App from "./App.vue";

import.meta.glob([
    '../images/**',
]);

const pinia = createPinia()

createApp(App)
.use(router)
.use(pinia)
.mount("#app");