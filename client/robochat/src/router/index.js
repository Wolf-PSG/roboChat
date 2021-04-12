import {createRouter, createWebHistory} from "vue-router";
import Landing from "@/pages/Landing.page.vue";
import About from "@/pages/About.page.vue";
import Forums from "@/pages/Forums.page.vue";
import Chat from "@/pages/Chat.page.vue";

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
    {
        path: "/forums",
        name: "Forums",
        component: Forums
    },
    {
        path: "/forums/:id",
        name: "Chat",
        component: Chat
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
