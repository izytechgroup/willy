import Vue from 'vue'
import Router from 'vue-router'

import HomeView from '../views/home/home'

Vue.use(Router)

export default new Router({
    routes: [
        {path: '/', name: 'home', component: HomeView}
    ]
})
