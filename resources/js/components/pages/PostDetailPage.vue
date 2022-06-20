<template>
    <div>
        <h1 class="text-center">Dettagli del Post {{post.title}}</h1>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'PostDetailPage',
    data() {
        return {
            post: []
        }
    },
    methods: {
        getPosts() {
            axios.get(`http://localhost:8000/api/posts/${ this.$route.params.slug }`)
                 .then( (res) => {
                    console.log(res.data);

                    this.post = res.data;
                 });
        }
    },
    mounted() {
        this.getPosts();
        console.log( this.$route.params.slug )
    }

}
</script>