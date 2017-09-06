<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="left-side">
                    <div class="playlists">
                        <h4><i class="flaticon-minus"></i> Playlists</h4>

                        <div class="items">
                            <playlist v-for="p in playlists" :key="p.id" :playlist="p"></playlist>
                        </div>
                    </div>

                    <div class="menu">
                        <ul class="list-inline">
                             <li>
                                 <a href="">
                                     Aide
                                 </a>
                             </li>

                             <li>
                                 <a href="">
                                     Biomédical
                                 </a>
                             </li>

                             <li>
                                 <a href="">
                                     Contact
                                 </a>
                             </li>

                             <li>
                                 <a href="">
                                     Conditions
                                 </a>
                             </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-sm-8">
                <loader :loading="isLoadingSong"></loader>
                <songs></songs>
            </div>
        </div>
    </div>

</template>

<script>
import songs from '../../components/audio/songs'
import playlist from '../../components/audio/playlist'

export default {
    name: 'home',
    data () {
        return {
            isLoadingSong: false,
            plyalists: []
        }
    },

    components: {
        songs,
        playlist
    },

    methods: {
        getSongs () {
            this.isLoadingSong = true
            axios.get('/api/front/songs?limit=20')
            .then((response) => {
                this.isLoadingSong = false
                this.$store.commit('ADD_SONGS', response.data)
                this.$store.commit('SET_PLAYLIST_SONGS', response.data)
                this.$store.commit('SET_INITIAL_SONG', response.data[0])
            })
        },

        getPlaylists () {
            axios.get('/api/front/playlists')
            .then((response) => {
                this.isLoadingPlaylists = false
                this.$store.commit('ADD_PLAYLISTS', response.data)
            })
        }
    },

    mounted () {
        this.getSongs()
        this.getPlaylists()
    },

    computed: {
        playlists () {
            return this.$store.state.playlists
        }
    }
}
</script>

<style lang="scss">
.menu {
    border-top: 1px solid #ddd;
    margin-top:40px;
    padding-top: 10px;
    font-family: 'Open Sans', 'Source Sans Pro';

    a {
        color: #aaa;
        font-weight: 400;
        font-size: 13px;
    }
}
</style>
