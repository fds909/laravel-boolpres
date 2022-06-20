<template>
    <div>
        <!-- Loader -->
        <Loader v-if="isLoading"/>

        <div v-if="posts.length">
            <h2 class="text-center">Posts</h2>
            <ul class="pl-0">
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
                            <router-link :to="{ name: 'post-detail', params: { id: post.id } }"
                                         class="btn btn-primary">Details</router-link>
                        </div>
                    </div>
                </li>
            </ul>

            <Pagination :pagination="pagination" @on-page-change="getPosts"/>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Loader from '../Loader.vue';
    import Pagination from '../Pagination.vue';
undefined

    export default {
        name: 'PostList',
        components: {
    Loader,
    Pagination
},
        data() {
            return {
                posts: [],
                pagination: {},
                isLoading: true
            }
        },
        methods: {
            getPosts(page = 1) {
                axios.get("http://localhost:8000/api/posts?page=" + page)
                    .then( (res) => {
                        console.log(res.data);

                        const {
                            data,
                            current_page,
                            last_page
                        } = res.data;

                        console.log(data);
                        console.log(current_page);
                        console.log(last_page);

                        this.posts = data;

                        this.pagination = {
                            currentPage: current_page,
                            lastPage: last_page
                        }


                    }).then( () => {
                        console.log('Terminato il caricamento dei posts');
                        this.isLoading = false;
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