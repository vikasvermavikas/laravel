<template>
    <div class="container mt-5">
        <div class="col-12 text-center">
            <h1>Welcome to my first App.</h1>
            <!-- <a href="https://techvblogs.com?utm_source=blogExampleRepo" target="_blank">Visit For More Blogs</a> -->
        </div>
    </div>
</template>

<script>
export default {
    name: 'Home',
    watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = to.meta.title || 'Some Default Title';
            }
        }
    },
}
</script>

<style scoped>
</style>