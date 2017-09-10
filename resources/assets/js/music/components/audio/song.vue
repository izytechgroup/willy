<template lang="html">
    <div class="song">
        <div class="cover">
            <img :src="song.cover" alt="">
        </div>

        <div class="details">
            <div class="play" @click="play()">
                <i class="flaticon-play-round" v-show="!isPlaying"></i>
                <i class="flaticon-pause-round" v-show="isPlaying"></i>
            </div>


            <div class="title">
                {{ song.artist }} - {{ song.title }}
            </div>

            <div class="metas">
                <ul class="list-inline">
                    <li><i class="flaticon-time"></i> {{ song.duration }}</li>
                    <li><i class="flaticon-headphones"></i> {{ song.plays }}</li>
                    <li><i class="flaticon-download"></i> {{ song.downloads }}</li>
                    <li><i class="flaticon-playlist"></i> {{ song.playlist_title }}</li>
                </ul>
            </div>

            <div class="buttons">
                <button class="btn btn-red" @click="download()" v-show="canDownload">
                    <i class="flaticon-download"></i> Télécharger
                </button>

                <button class="btn btn-dark" @click="open()">
                    <i class="flaticon-redo"></i>
                    Afficher
                </button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'song',
    props: ['song'],

    methods: {
        play () {
            this.$store.commit('PLAY_SONG', this.song)
        },

        download () {
            let url = '/songs/' + this.song.number + '/downloads/'
            window.open(url, '_blank');
        },

        open () {
            this.$router.push({
                name: 'song',
                params: {
                    id: this.song.number
                }
            })
        }
    },

    computed: {
        isPlaying () {
            return this.$store.state.isPlaying && this.currentTrack.number == this.song.number
        },

        currentTrack () {
            return this.$store.state.song
        },

        canDownload () {
            return this.song.can_download == '1'
        }
    }
}
</script>

<style lang="scss" scoped>
.song {
    position: relative;

    equalizer {
        width: 100%;
    }

    > .details {
        > .title {
            font-size: 16px;
        }

        > .buttons {
            margin-top: 20px;
        }
    }

}
</style>
