import { createWebHistory, createRouter } from "vue-router";
import Landing from "@/pages/Landing.page.vue";
import About from "@/pages/About.page.vue";

const routes = [
    {
        path: "/",
        name: "Landing",
        component: Landing
    },
    {
        path: "/about",
        name: "About",
        component: About
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
