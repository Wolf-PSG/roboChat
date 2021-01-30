<template>
    <div>
        <!-- TODO implement global store for which page user is on and add name to page title -->
        <h1>Chats Page</h1>
        <Bubble
            v-for="item in messages"
            v-bind:key="item.id"
            v-bind:message="item.message"
            v-bind:name="item.name"
            v-bind:createdAt="item.createdAt"
        />

        <Input
            room_id="{{this.room_id}}"
            class="absolute inset-x-0 bottom-0 h-24 "
        />
    </div>
</template>

<script>
import axios from "axios";
import Bubble from "../components/bubble/bubble.component";
import Input from "../components/input/input.component";

export default {
    async created() {
        await this.getMessages().then(res => {
            const { data } = res;
            data.forEach(element => {
                this.messages.push(element);
            });
        });
    },
    data() {
        return {
            messages: [],
            room_id: 1,
        };
    },
    methods: {
        getMessages: async () => {
            const { pathname } = window.location;
            const searchID = pathname.split("/forums/");
            return axios.get("http://127.0.0.1:8000/api/chat/" + searchID[1]);
        }
    },
    components: {
        Bubble,
        Input
    }
};
</script>
