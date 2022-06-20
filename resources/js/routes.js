import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Import components
import HomePage from './components/pages/HomePage.vue';
import ContactPage from './components/pages/ContactPage.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';
import PostDetailPage from './components/pages/PostDetailPage.vue';

//Inizializzare il router
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: '/', component: HomePage, name: 'home' },
        { path: '/contacts', component: ContactPage, name: 'contacts' },
        { path:  '/posts/:slug', component: PostDetailPage, name: 'post-detail'},
        { path: '*', component: NotFoundPage, name: 'notFound' }
    ]
});

export default router;