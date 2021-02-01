import { createApp } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import Echo from "laravel-echo";
import router from "./router";
import App from "./App.vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faCommentDots,
    faUsers,
    faInfoCircle
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import "./index.css";

library.add(faCommentDots);
library.add(faUsers);
library.add(faInfoCircle);

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "local",
    cluster: "eu",
    wsHost: "127.0.0.1",
    wsPort: 6001,
    forceTLS: false
});

createApp(App)
    .component("font-awesome-icon", FontAwesomeIcon)
    .use(VueAxios, axios)
    .use(router)
    .mount("#app");
