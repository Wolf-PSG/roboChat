<template>
    <div class="clearfix float-left">
        <div class="bg-gray-300 w-4/6 mx-4 my-2 p-2 rounded-lg min-w-full">
            {{ message }}
        </div>
        <div>{{ name }}: {{ createdAt }}</div>
    </div>
</template>

<script>
export default {
    name: "Bubble",
    props: {
        message: String,
        name: String,
        createdAt: Date
    }
};
</script>

<style></style>
