<template lang="html">
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

</style>
