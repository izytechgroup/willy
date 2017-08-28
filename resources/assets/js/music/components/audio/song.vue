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
                </ul>
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

<style lang="css" scoped>
.song {
    position: relative;

    equalizer {
        width: 100%;
    }
}
</style>
