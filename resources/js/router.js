import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [{
    path: '',
    redirect: 'home',
    component: () => import('./components/App.vue'),
    children: [
        // =============================================================================
        // Theme Routes
        // =============================================================================
        {
            path: '/home',
            name: 'home',
            component: () => import('./components/Home.vue')
        },
    ]
}];


export default new VueRouter({

    // Refresh Problem with 'History'

    mode: 'history',
    base: '/panel/',
    routes

});
