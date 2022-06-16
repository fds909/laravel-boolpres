<template>
    <div>
        <h2 class="text-center">Posts</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <div class="card mb-3 text-center">
                    <h5 class="card-header">{{post.title}}</h5>
                    <h6 class="card-header">Author: <em>{{post.author.name}} {{post.author.surname}}</em></h6>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span v-for="tag in post.tags" :key="tag.id" class="badge badge-pill"
                                    :style="`background-color: ${tag.color}`">
                            {{ tag.label }}
                            </span>
                        </h5>
                        <p class="card-text">{{ post.content }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
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
    ul {
        list-style-type: none;
    }
</style>