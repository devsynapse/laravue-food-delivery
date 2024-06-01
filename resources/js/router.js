import { createRouter, createWebHistory } from 'vue-router';
import HomeRoute from './Pages/Home.vue';
import ProductsRoute from './Pages/Products.vue';
import ProductRoute from './Pages/Product.vue';
import CartRoute from './Pages/Cart.vue';
import AdminRoute from './Pages/Admin.vue';
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
        component: ProductRoute,
    },
    {
        path: '/cart',
        component: CartRoute,
    },
    {
        path: '/admin',
        component: AdminRoute,
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