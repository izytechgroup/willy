<template lang="html">
    <div class="sound-manager">

    </div>
</template>

<script>

export default {
    name: 'player',

    data () {
        return {
            sManager: null,
            soundManagerReady: false
        }
    },

    mounted() {
        const that = this

        window.eventBus.$on('player.play', function () {
            that.playTrack()
        })

        window.eventBus.$on('player.set', function () {
            that.setupSoundManager()
        })

        window.eventBus.$on('player.stop', function () {
            that.stopPlayer()
        })

        window.eventBus.$on('player.mute', function () {
            that.mutePlayer()
        })

        window.eventBus.$on('player.seek', function (percent) {
            that.seek(percent)
        })

        window.eventBus.$on('player.increment', function () {
            that.incrementPlays()
        })
    },

    computed: {
        isPlaying () {
            return this.$store.state.isPlaying
        },

        song () {
            return this.$store.state.song
        },

        audioEnded () {
            return this.audio.ended
        },

        src () {
            return this.$store.state.song.link
        },

        duration () {
            return this.$store.state.duration
        }
    },

    methods: {
        play () {
            this.$store.commit('TOGGLE_PLAY')
        },

        playTrack () {
            this.sManager.togglePause()
        },

        seek (percent) {
            const pos = this.duration / percent * 1000
            this.sManager.setPosition(pos)
        },

        incrementPlays () {
            axios.get('/api/front/songs/' + this.$store.state.song.number + '/increment')
        },

        setupSoundManager () {
            soundManager.setup({
                url: '/assets/swf/soundmanager2.swf',
                flashVersion: 9,

                onready: function() {
                    this.soundManagerReady = true
                },

                ontimeout: function (e) {
                    console.log('Timed out', e);
                }
             })
        },

        loadSong() {
            const that = this
            if (this.sManager) this.sManager.destruct()
            that.$store.commit('SET_LOADING_SONG', true)

            this.sManager = soundManager.createSound({
                url: this.song.link,
                autoLoad: true,

                whileloading: function () {
                    that.$store.commit('SET_LOADED', Math.floor(this.bytesLoaded * 100))
                },

                onload: function () {
                    that.$store.commit('SET_LOADING_SONG', false)
                    that.$store.dispatch('trackDuration', this.duration)
                    if (that.isPlaying) that.sManager.play()
                },

                whileplaying: function () {
                    that.$store.commit('UPDATE_ELAPSED', Math.floor(this.position / 1000))
                },

                onfinish: function () {
                    that.$store.dispatch('audioEnded')
                }
            })
        },
    },

    watch: {
        song: function(val) {
            this.loadSong()
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
