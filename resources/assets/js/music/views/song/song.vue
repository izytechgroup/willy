<template lang="html">
    <div class="song-view">
        <h4><i class="flaticon-minus"></i> Song</h4>

        <loader :loading="isLoading"></loader>

        <div class="content">
            <div class="row">
                <div class="col-sm-4">
                    <img :src="song.cover" alt="" class="img-responsive">
                </div>

                <div class="col-sm-8">
                    <div class="details">
                        <h3> {{ song.title }}</h3>
                        <ul class="metas list-inline">
                            <li><i class="flaticon-time"></i> {{ song.duration }}</li>
                            <li><i class="flaticon-headphones"></i> {{ song.plays }}</li>
                            <li><i class="flaticon-download"></i> {{ song.downloads }}</li>
                            <li><i class="flaticon-playlist"></i> {{ song.playlist_title }}</li>
                        </ul>
                    </div>

                    <div class="buttons">
                        <ul class="list-inline">
                            <li>
                                <button class="btn btn-red" @click="play()">
                                    <span v-show="!isPlaying"><i class="flaticon-play-2"></i> Lire</span>
                                    <span v-show="isPlaying"><i class="flaticon-pause"></i> Pause</span>
                                </button>
                            </li>

                            <li>
                                <button class="btn btn-blue" @click="download()">
                                    <i class="flaticon-download"></i> Télécharger
                                </button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'song',

    data () {
        return {
            song: {},
            isLoading: false
        }
    },

    methods: {
        getSong () {
            this.isLoading = true
            axios.get('/api/front/songs/' + this.$route.params.id)
            .then(response => {
                this.isLoading = false
                this.song = response.data
            })
        },

        play () {
            this.$store.commit('PLAY_SONG', this.song)
        },

        download () {
            let url = '/songs/' + this.song.number + '/downloads/'
            window.open(url, '_blank');
        },
    },

    mounted () {
        this.getSong()
    },

    computed: {
        isPlaying () {
            if ((this.$store.state.song.number === this.song.number) && this.$store.state.isPlaying) {
                return true
            }
            return false
        }
    }
}
</script>

<style lang="scss" scoped>
.song-view {
    .content {
        background-color: white;
        font-family: 'Source Sans Pro', 'Open Sans', sans-serif;

        .metas {
            color: #636d7e;
            font-weight: 500;
            font-size: 14px;
            i {margin-right: 2px;}
        }

        .buttons {
            margin-top:20px;
        }
    }
}

@media (max-width: 767px) {
    .song-view {
        .content {
            .details, .buttons {
                padding: 0 10px;
            }
        }
    }
}
</style>
