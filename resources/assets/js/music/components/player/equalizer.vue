<template lang="html">
    <div class="equalizer-container">
        <div>
            <canvas></canvas>
        </div>

    </div>
</template>

<script>
export default {
    name: 'equalizer',
    data () {
        return {
            ids: [],
            audio: new Audio(),
            interval: '',
            elapsedInterval: ''
        }
    },

    mounted () {
        const that = this
        for (var i = 1; i < 128; i++) {
            this.ids.push(i)
        }

        window.eventBus.$on('player.play', function () {
            that.playTrack()
        })

        window.eventBus.$on('player.set', function () {
            that.initializeEqualizer()
        })

        window.eventBus.$on('player.change', function () {
            that.changeTrack()
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
        }
    },

    methods: {
        play () {
            this.$store.commit('TOGGLE_PLAY')
        },

        playTrack () {
            if (this.audio.paused) {
                this.audio.play()
                this.watchForEnd()
                this.updateDuration()

                let that = this
                this.audio.addEventListener("loadeddata", function() {
                    that.$store.commit('TRACK_DURATION', that.audio.duration)
                })
            } else {
                this.audio.pause()
                clearInterval(this.interval)
                clearInterval(this.elapsedInterval)
            }
        },

        changeTrack () {
            this.audio.src = this.song.link


            this.play()
        },

        stopPlayer () {
            this.audio.pause()
        },

        mutePlayer () {
            this.audio.muted = this.$store.state.isMute
        },

        seek (percent) {
            this.audio.currentTime = this.audio.duration / percent
            this.$store.commit('UPDATE_ELAPSED', this.audio.currentTime)
        },

        watchForEnd () {
            this.interval = setInterval(() => {
                if (this.audio.ended) {
                    this.$store.dispatch('audioEnded')
                    clearInterval(this.interval)
                }
            }, 1000)
        },

        updateDuration () {
            this.elapsedInterval = setInterval(() => {
                this.$store.commit('UPDATE_ELAPSED', this.audio.currentTime)
                if (this.audio.ended) {
                    clearInterval(this.elapsedInterval)
                }
            }, 1000)
        },

        incrementPlays () {
            axios.get('/api/front/songs/' + this.$store.state.song.number + '/increment')
        },

        initializeEqualizer () {
            let canvas = document.querySelector('canvas')
            let width = canvas.width = canvas.scrollWidth
            let height = canvas.height = canvas.scrollHeight
            let ctx = canvas.getContext('2d')

            let context = new AudioContext()
            let analyser = context.createAnalyser()

            let biquadFilter = context.createBiquadFilter()
            biquadFilter.type = "lowpass"
            biquadFilter.frequency.value = 20000
            biquadFilter.Q.value = 20
            this.audio.crossOrigin = 'anonymous'

            let source = context.createMediaElementSource(this.audio)
            source.connect(biquadFilter)
            biquadFilter.connect(analyser)
            analyser.connect(context.destination)

            this.audio.src = this.src

            const that = this
            this.audio.addEventListener("loadeddata", function() {
                that.$store.commit('TRACK_DURATION', that.audio.duration)
            })

            let loop = function () {
                window.requestAnimationFrame(loop)
                let freq = new Uint8Array(analyser.frequencyBinCount)
                analyser.getByteFrequencyData(freq)

                let data = new Uint8Array(analyser.frequencyBinCount)
                analyser.getByteTimeDomainData(data)

                ctx.clearRect(0, 0, width, height)

                freq.forEach((f, i) => {
                    ctx.fillStyle = '#ff0000'
                    ctx.fillRect(i, (height - f) / 2, 1, f)
                })

                ctx.lineWidth = 1
                ctx.strokeStyle = '#21292f'
                ctx.beginPath()

                ctx.moveTo(0, data[0] / 128 * height / 2)
                data.forEach((d, x) => {
                    let v = d / 128
                    let y = v * height / 2
                    ctx.lineTo(x, y)
                })
                ctx.lineTo(width, height / 2)
                ctx.stroke()
            }

            loop()
        }
    },

    destroyed () {
         clearInterval(this.interval)
         clearInterval(this.elapsedInterval)
    }
}
</script>

<style lang="scss">
.equalizer-container {
    width: 100%;
    height: 250px;
    position: fixed;
    bottom: 0;
    z-index:9;
    margin-bottom: -66px;

    canvas {
        width: 100%;
        height: 250px;
        position: absolute;
    }
}
</style>
