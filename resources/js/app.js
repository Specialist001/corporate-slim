require('./bootstrap');

window.Vue = require('vue');

// Vue.component('example', require('./components/Example.vue'));


// import Vue from 'vue';
import VueRouter from 'vue-router';
// import Vuex from 'vuex';

window.Vue.use(VueRouter);

import NewsIndex from './components/news/NewsIndex.vue';
import NewsCreate from './components/news/NewsCreate.vue';
import NewsEdit from './components/news/NewsEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            newsIndex: NewsIndex
        }
    },
    {path: '/news/create', component: NewsCreate, name: 'createNews'},
    {path: '/news/edit', component: NewsEdit, name: 'editNews'},
];

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
