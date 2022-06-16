<template>
    <div>
        <HeaderComp/>

        <main>
            <div class="container">
                <PostList/>
            </div>
        </main>
    </div>
</template>

<script>
    import HeaderComp from './HeaderComp.vue';
    import PostList from './posts/PostList.vue';

    export default {
        name: "App",
        components: {
            HeaderComp,
            PostList,
        }
    }
</script>

<style scoped>
    main {
        padding: 40px 0;
    }
</style>
