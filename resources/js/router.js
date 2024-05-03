import { createRouter, createWebHistory } from 'vue-router';
import HomeRoute from './Pages/Home.vue';
import ProductsRoute from './Pages/Products.vue';
import ProductRoute from './Pages/Product.vue';
import NotFoundRoute from './Pages/NotFound.vue';

const routes = [
    {
        path: '/',
        component: HomeRoute,
    },
    {
        path: '/products',
        component: ProductsRoute,
    },
    {
        path: '/products/:id',
        component: () => ProductRoute,
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFoundRoute,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});