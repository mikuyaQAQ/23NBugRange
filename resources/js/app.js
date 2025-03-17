import './bootstrap';

import 'admin-lte/plugins/jquery/jquery.min.js';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';
// 从vue导入createApp
import { createApp } from 'vue/dist/vue.esm-bundler.js';
// 从vue-router导入createRouter
import { createRouter, createWebHistory } from 'vue-router';
import Routes from './routes.js';
// 导入Login组件
import Login from './pages/Auth/Login.vue';


// 创建应用程序
const app = createApp({});

// 创建一个路由器
const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});

app.use(router);

app.component('Login', Login);

app.mount('#app');


