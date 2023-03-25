import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'index',
            component: () => import('../views/product/Index.vue')
        },
        {
            path: '/main',
            name: 'main',
            component: () => import('../views/main/Index.vue')
        },
        {
            path: '/products',
            name: 'products.index',
            component: () => import('../views/product/Index.vue')
        },
        {
            path: '/products/:id',
            name: 'products.show',
            component: () => import('../views/product/Show.vue')
        },
        {
            path: '/cart',
            name: 'cart',
            component: () => import('../views/cart/Index.vue')
        },
        {
            path: '/wishlist',
            name: 'wishlist',
            component: () => import('../views/wishlist/Index.vue')
        },
    ]
})

export default router
