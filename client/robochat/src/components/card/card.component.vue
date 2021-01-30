<template>
    <div class="container max-w-xs flex float-left hover:bg-blue-100">
        <router-link :to="{path: '/forums/' + forum_id}">
            <img  alt="Vue logo" src="../../assets/dal43gus8xb61.jpg" />
            <h1 class="text-xl font-weight-bold">
                {{ forum_name }}
            </h1>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: {
        forum_name: String,
        forum_id: Number
    }
};
</script>

<style></style>
