<template>
    <div>
        <h2 class="text-center">Posts</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                {{post.title}}
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'PostList',
        data() {
            return {
                posts: []
            }
        },
        methods: {
            getPosts() {
                axios.get("http://localhost:8000/api/posts")
                    .then( (res) => {
                        console.log(res.data);
                        this.posts = res.data;
                    })
            },
        },
        mounted() {
                this.getPosts();
        },
    }
</script>

<style scoped>

</style>