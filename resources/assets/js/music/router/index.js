import Vue from 'vue'
import Router from 'vue-router'

import HomeView from '../views/home/home'
import SongView from '../views/song/song'
import PlaylistView from '../views/playlist/playlist'

Vue.use(Router)

export default new Router({
    routes: [
        { path: '/', name: 'home', component: HomeView },
        { path: '/song/:id', name: 'song', component: SongView },
        { path: '/playlist/:id', name: 'playlist', component: PlaylistView },
    ]
})
