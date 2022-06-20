<template>
    <div>
        <h1 class="text-center">Dettagli del Post {{post.title}}</h1>

        <Alert
            v-if="isError"
            message="Il post non esiste"
            type="danger"
        />

        <p>{{ post.content }}</p>
    </div>
</template>

<script>
import axios from 'axios';
import Alert from '../Alert.vue';

export default {
    name: 'PostDetailPage',
    components : {
        Alert
    },
    data() {
        return {
            post: [],
            isError: false
        }
    },
    methods: {
        getPosts() {
            axios.get(`http://localhost:8000/api/posts/${ this.$route.params.slug }`)
                 .then( (res) => {
                    console.log(res.data);

                    this.post = res.data;
                 }).catch((err) => {
                    console.log(err);
                    this.isError = true;
                 });
        }
    },
    mounted() {
        this.getPosts();
        console.log( this.$route.params.slug )
    }

}
</script>