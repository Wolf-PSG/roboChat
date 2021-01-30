<template>
    <div>
        <nav class="navigation">
            <router-link class="nav_link" to="/forums">
                Forums
            </router-link>
            <router-link class="nav_link" to="/about">
                About
            </router-link>
        </nav>        
        <router-view />
    </div>
</template>

<script>
export default {
    name: "App",
    components: {}
};
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
.best_h1 {
    position: absolute;
    top: 50%;
}
.navigation {
    height: 100px;
    width: auto;
    display: flex;
    justify-content: space-around;
    text-align: center;
    margin: 20px auto;
    float: right;
}
a {
  text-decorations:none;
  color:black;
}
.nav_link {
  padding-right: 30px;
}
</style>
