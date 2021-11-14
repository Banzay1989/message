import {createWebHistory, createRouter} from "vue-router";

import Form from "../pages/Form";

export const routes = [
    {
        name: 'form',
        path: '/',
        component: Form
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
