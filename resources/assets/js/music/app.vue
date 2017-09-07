<template>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="playlists">
                        <h4><i class="flaticon-minus"></i> Playlists</h4>

                        <div class="items">
                            <playlist v-for="p in playlists" :key="p.id" :playlist="p"></playlist>
                        </div>
                    </div>
                </div>


                <!-- Pages  -->
                <div class="col-sm-8">
                    <transition
                        :duration="100"
                        name="custom-classes-transition"
                        enter-active-class="animated fadeIn">
                        <router-view></router-view>
                    </transition>


                    <menuList></menuList>
                </div>
            </div>
        </div>
        <!-- End of container  -->

        <equalizer></equalizer>
        <willy-mix-player></willy-mix-player>
    </section>
</template>

<script>
import playlist from './components/audio/playlist'
import menuList from './components/menu/menu'

export default {
    name: 'app',

    components: {
        menuList,
        playlist
    },

    methods: {
        getSongs () {
            this.$store.commit('LOADING_SONG')
            axios.get('/api/front/songs?limit=20')
            .then((response) => {
                this.$store.commit('LOADING_SONG')
                this.$store.commit('ADD_SONGS', response.data)
                this.$store.commit('SET_PLAYLIST_SONGS', response.data)
                this.$store.commit('SET_INITIAL_SONG', response.data[0])
            })
        },

        getPlaylists () {
            this.$store.commit('LOADING_PLAYLISTS')
            axios.get('/api/front/playlists')
            .then((response) => {
                this.$store.commit('LOADING_PLAYLISTS')
                this.$store.commit('ADD_PLAYLISTS', response.data)
            })
        }
    },

    computed: {
        playlists () {
            return this.$store.state.playlists
        }
    },

    mounted () {
        this.getSongs()
        this.getPlaylists()
    },
}
</script>
