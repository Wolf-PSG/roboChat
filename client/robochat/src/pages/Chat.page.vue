<template>
  <div>
    <head>
      <meta name="crsf-token" content="{{crsf-token}}" />
    </head>
    <!-- TODO implement global store for which page user is on and add name to page title -->
    <h1>Chats Page</h1>
    <div class="flex flex-col overflow-scroll max-h-px">
      <Bubble
        v-for="item in messages"
        v-bind:key="item.id"
        v-bind:message="item.message"
        v-bind:name="item.name"
        v-bind:createdAt="item.createdAt"
      />
    </div>
    <!-- Changed createdAt to created_at once fixed timing -->
    <Input
      v-bind:room_id="this.room_id"
      class="absolute inset-x-0 bottom-0 h-24"
    />
  </div>
</template>

<script>
// import Echo from "laravel-echo";
// import Pusher from "pusher-js";
import axios from "axios";
import Bubble from "../components/bubble/bubble.component";
import Input from "../components/input/input.component";

export default {
  async created() {
    this.connection();
  },
  data: function () {
    return {
      messages: [],
      room_id: "",
    };
  },
  methods: {
    connection() {
      let vm = this;
      this.getMessages();
      window.Echo.channel("roboChat." + this.room_id).listen(
        "NewMessage",
        () => {
          vm.messages = [];
          vm.getMessages();
        }
      );
    },
    getMessages() {
      const { pathname } = window.location;
      const searchID = pathname.split("/forums/");
      console.log(this.room_id);
      this.room_id = searchID[1];
      console.log(this.room_id);
      axios.get("http://127.0.0.1:8000/api/chat/" + searchID[1]).then((res) => {
        const { data } = res;
        data.forEach((element) => {
          this.messages.push(element);
        });
      });
    },
  },
  components: {
    Bubble,
    Input,
  },
};
</script>