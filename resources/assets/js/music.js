require('./bootstrap');


import router from './music/router'
import store from './music/store'
import App from './music/app'

import evento from './plugins/evento'
Vue.use(evento)

Vue.component('song', require('./music/components/song/song'))
Vue.component('equalizer', require('./music/components/player/equalizer'))
Vue.component('willy-mix-player', require('./music/components/player/index'))

const app = new Vue({
    el: '#music',
    router,
    store,
    template: '<App/>',
    components: { App }
});
