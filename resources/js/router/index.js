import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/Index.vue';
import PageNotFound from '../components/PageNotFound.vue';
import AnimalIndex from '../components/animal/Index.vue';
import AnimalDetails from '../components/animal/Details.vue';

import { trimEnd } from "lodash";

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: "/animal",
        name: "animalIndex",
        component: AnimalIndex,
    },
    {
        path: "/animal/:id",
        name: "AnimalDetails",
        component: AnimalDetails,
        props: true,
    },
    {
        path: "/:catchAll(.*)",
        name: "NotFound",
        component: PageNotFound,
        // meta: {
        //   requiresAuth: false
        // }
      }
]   

const router = createRouter({
    history: createWebHistory(),
    routes,
    mode: 'hash'
  });

export default router;