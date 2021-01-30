import { createApp } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
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

createApp(App)
    .component("font-awesome-icon", FontAwesomeIcon)
    .use(VueAxios, axios)
    .use(router)
    .mount("#app");
