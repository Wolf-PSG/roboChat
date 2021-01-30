<template>
    <div class="header">
        <nav class="navigation">
            <a href="/forums">
                Forums
            </a>
            <a href="/about">
                About
            </a>
            <a href="/contact">
                Contact
            </a>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style scoped>
    .navigation {
        height: 100px;
        width: auto;
        display: flex;
        justify-content: space-around;
        text-align: center;
        margin: 20px auto;
        float: right;
    }
</style>
