<template>
  <div class="clearfix float-left">
    <meta name="crsf-token" content="{{crsf-token}}" />

    <input
      ref="input"
      class="inline px-2 py-2 h-12 leading-normal block w-3/4 text-gray-800 bg-white font-sans rounded-lg text-left appearance-none outline-none border bg-gray-200 focus:bg-white"
      placeholder="Enter Message"
      v-model="message"
      @keyup.enter="sendMessage()"
    />
    <button
      class="inline ml-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      type="submit"
      @click="sendMessage()"
    >
      Send Message
    </button>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Input",
  props: {
    room_id: String,
  },
  data() {
    return {
      message: "",
    };
  },
  methods: {
    sendMessage: function () {
      console.log(this.room_id);
      console.log(this.message);
      axios
        .post("http://127.0.0.1:8000/api/chat/" + this.room_id, {
          message: this.message,
          name: "Parmjit",
        })
        .then((res) => {
          if (res.status === 201) {
            this.$data.message = "";
            this.$emit("message sent");
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style></style>
