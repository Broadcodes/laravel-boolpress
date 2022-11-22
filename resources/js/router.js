import Vue from 'vue';
import VueRouter from 'vue-router';

import About from './pages/About'
import Contacts from './pages/Contacts'
import NotFound from './pages/NotFound'
import Home from './pages/Home'
import PostsIndex from './pages/PostsIndex'

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {path: '/', name: 'home', component: Home},
        {path: '/posts', name: 'posts-index', component: PostsIndex},
        {path: '/chi-siamo', name: 'chi-siamo', component: About},
        {path: '/contatti', name: 'contatti', component: Contacts},
        {path: '/*', name: 'NotFound', component: NotFound}
    ],
});

export default router;
