<template>
    <div>
        <h1>Forums Page</h1>
        <Card
            v-for="item in forums"
            v-bind:forum_name="item.name"
            v-bind:forum_id="item.id"
            v-bind:key="item.id"
        />
    </div>
</template>

<script>
import axios from "axios";
import Card from "../components/card/card.component";
export default {
    async created() {
        await this.getForums().then(res => {
            const { data } = res;
            data.forEach(element => {
                this.forums.push(element);
            });
        });
    },
    data() {
        return {
            forums: []
        };
    },
    methods: {
        getForums: async () => {
            return axios.get("http://127.0.0.1:8000/api/room");
        }
    },
    components: {
        Card
    }
};
</script>
