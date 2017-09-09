<template lang="html">
    <div class="playlist">
        <h4><i class="flaticon-minus"></i> Playlist</h4>

        <loader :loading="isLoading"></loader>

        <div class="playlist-content" v-show="!isLoading">
            <div class="row">
                <div class="col-sm-4">
                    <img :src="playlist.cover" alt="" class="img-responsive">
                </div>

                <div class="col-sm-8">
                    <div class="details">
                        <h3> {{ playlist.title }}</h3>
                        <ul class="metas list-inline">
                            <li><i class="flaticon-sound"></i> {{ songs.length }} Titre{{ hasMany ? 's': '' }}</li>
                            <li><i class="flaticon-time"></i> {{ seconds | duration }}</li>
                        </ul>
                    </div>

                    <div class="songs">
                        <div class="song-item" v-for="s in songs">
                            <ul class="list-inline">
                                <li @click="open(s)">
                                    <i class="flaticon-redo"></i>
                                </li>

                                <li @click="play(s)">
                                    {{ s.title }} - {{ s.duration }}
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'playlist',

    data () {
        return {
            songs: [],
            playlist: {},
            isLoading: false,
            seconds: 0
        }
    },

    methods: {
        getPlaylist () {
            this.isLoading = true
            axios.get('/api/front/playlists/' + this.$route.params.id)
            .then(response => {
                this.isLoading = false
                this.playlist = response.data
                this.songs = response.data.songs
                this.seconds = this.totalSeconds()
            })
        },

        totalSeconds () {
            let min = 0
            this.songs.forEach(s => {
                s.cover = this.playlist.cover_sm
                min += this.toSeconds(s.duration)
            })
            return min
        },

        toSeconds (str) {
            var min = str.split(':')
            return Number(min[0]) * 60 + Number(min[1])
        },

        play (s) {
            this.$store.commit('PLAY_SONG', s)
        },

        open (s) {
            this.$router.push({
                name: 'song',
                params: {
                    id: s.number
                }
            })
        }
    },

    mounted () {
        this.getPlaylist()
    },

    computed: {
        hasMany () {
            return this.songs.length > 1
        }
    },

    watch: {
        '$route' () {
            this.getPlaylist()
        }
    }
}
</script>

<style lang="scss" scoped>
.playlist-content {
    background-color: white;
    margin-top: 5px;

    .details {
        padding: 0;
        margin: 0;
        padding-top: 10px;
        font-family: 'Source Sans Pro', 'Open Sans', sans-serif;

        h3 {
            margin: 0;
            font-weight: 500;
            width: 100%;
            margin-bottom: 5px;
            color: red;
        }

        .metas {
            color: #636d7e;
            font-weight: 500;
            font-size: 14px;
            i {margin-right: 5px;}
        }
    }

    .songs {
        position: relative;
        width: 100%;
        margin-top: 20px;

        .song-item {
            width: 100%;
            overflow: hidden;
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;

            li {
                margin:0;
                cursor: pointer;
                i {margin:0}
            }
        }
    }
}
</style>
