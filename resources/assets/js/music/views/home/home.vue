<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="playlists">
                    <h4><i class="flaticon-minus"></i> Playlists</h4>

                    <div class="items">
                        <div class="item">
                            <a href="">
                                <img src="https://static.gigwise.com/gallery/5209864_8262181_JasonDeruloTatGall.jpg">
                            </a>

                            <div class="details">
                                <h5><a href="">Mix Audio</a></h5>

                                <ul class="list-unstyled">
                                    <li><i class="flaticon-sound"></i> 22 Titres</li>
                                    <li>
                                        <a href="">
                                            <i class="flaticon-play"></i> Lire Tout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="item">
                            <a href="">
                                <img src="http://6uh9u7hhy8-flywheel.netdna-ssl.com/wp-content/uploads/2016/03/beyonce-formation-tracklist-1.jpg">
                            </a>

                            <div class="details">
                                <h5><a href="">Audio DJ</a></h5>

                                <ul class="list-unstyled">
                                    <li><i class="flaticon-sound"></i> 13 Titres</li>
                                    <li>
                                        <a href="">
                                            <i class="flaticon-play"></i> Lire Tout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="songs">
                    <h4><i class="flaticon-minus"></i> Songs</h4>

                    <loader :loading="isLoadingSong"></loader>

                    <div class="list">
                        <song v-for="s in songs" :key="s.number" :song="s"></song>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import song from '../../components/audio/song'
export default {
    name: 'home',
    data () {
        return {
            isLoadingSong: false,
            songs: []
        }
    },

    components: {
        song
    },

    methods: {
        getSongs () {
            this.isLoadingSong = true
            axios.get('/api/front/songs?limit=20')
            .then((response) => {
                this.isLoadingSong = false
                this.songs = response.data
                console.log(response);
                this.$store.commit('SET_PLAYLIST_SONG', this.songs)
            })
        }
    },

    mounted () {
        this.getSongs()
    }
}
</script>

<style lang="scss">
</style>
