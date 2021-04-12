<template>
  <div class="flex flex-col h-s.creen justify-between">
    <meta name="crsf-token" content="{{crsf-token}}" />
    <header class="bg-blue-300 p-4">
      <nav class="flex justify-between">
        <div>
          <router-link to="/">
            <font-awesome-icon icon="users" size="3x" />
          </router-link>
        </div>
        <input
          ref="input"
          class="w-1/5 text-gray-800 bg-white font-sans rounded-lg text-left appearance-none outline-none border bg-gray-200 focus:bg-white"
          placeholder="Create Room"
          v-model="room"
          @keyup.enter="createRoom()"
        />
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
          type="submit"
          @click="createRoom()"
        >
          Submit
        </button>
        <ul class="flex flex-row">
          <router-link class="pr-10" to="/forums">
            <font-awesome-icon icon="comment-dots" size="3x" />
          </router-link>
          <router-link class="pr-10" to="/about">
            <font-awesome-icon icon="info-circle" size="3x" />
          </router-link>
        </ul>
      </nav>
    </header>

    <main class="flex-grow content-center">
      <router-view/>
    </main>
    <footer
      class="bg-white absolute bottom-0 inset-x-0 pt-1 border-b-4 border-blue-700"
    >
      <p class="text-sm text-blue-700 font-bold mb-2">
        © 2021 By Parmjit Singh Gill
      </p>
    </footer>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "App",
  components: {},
  data() {
    return {
      room: "",
    };
  },
  methods: {
    createRoom: function () {
      console.log(this.room);
      axios
        .post("http://127.0.0.1:8000/api/room", { name: this.room })
        .then((res) => {
          if (res.status === 201) {
            this.$data.room = "";
            this.$emit("room created");
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
