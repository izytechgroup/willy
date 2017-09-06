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
                {{ song.title }}
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
                <a href="" class="btn btn-red">
                    <i class="flaticon-download"></i> Télécharger
                </a>

                <a href="" class="btn btn-dark">
                    <i class="flaticon-redo"></i>
                    Afficher
                </a>
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
        }
    },

    computed: {
        isPlaying () {
            return this.$store.state.isPlaying && this.currentTrack.number == this.song.number
        },

        currentTrack () {
            return this.$store.state.song
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
