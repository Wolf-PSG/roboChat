<template>
  <div class="flex flex-col h-s.creen justify-between">
    <header class="bg-blue-300 p-4">
      <nav class="flex justify-between">
        <div>
          <router-link to="/">
            <font-awesome-icon icon="users" size="3x" />
          </router-link>
        </div>
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

    <main class="flex-grow">
      <router-view />
    </main>
    <footer class="bg-white absolute bottom-0 inset-x-0 pt-1 border-b-4 border-blue-700">
      <p class="text-sm text-blue-700 font-bold mb-2">
        © 2021 By Parmjit Singh Gill
      </p>
    </footer>
  </div>
</template>

<script>
export default {
  name: "App",
  components: {},
};
</script>
