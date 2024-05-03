import './bootstrap';
import '../css/app.css';

import router from "./router";
import { createApp } from "vue";

import App from "./App.vue";

import.meta.glob([
    '../images/**',
]);

createApp(App).use(router).mount("#app");