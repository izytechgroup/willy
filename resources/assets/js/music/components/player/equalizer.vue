<template lang="html">
    <div class="">
        <canvas></canvas>
    </div>
</template>

<script>
export default {
    name: 'equalizer',
    props: ['song'],
    data () {
        return {
            ids: [],
            audio: {},
            src: '//willy.dev/mp3/marcher.mp3'
        }
    },

    mounted () {
        console.log('equalizer mounted')
        for (var i = 1; i < 128; i++) {
            this.ids.push(i)
        }

        this.initializeEqualizer()
    },

    methods: {
        initializeEqualizer () {
            let canvas = document.querySelector('canvas')
            let width = canvas.width = canvas.scrollWidth
            let height = canvas.height = 50
            let ctx = canvas.getContext('2d')

            let context = new AudioContext()
            let analyser = context.createAnalyser()

            let biquadFilter = context.createBiquadFilter()
            biquadFilter.type = "lowpass"
            biquadFilter.frequency.value = 20000
            biquadFilter.Q.value = 20

            let audio = new Audio()
            audio.loop = true
            audio.crossOrigin = 'anonymous'

            let source = context.createMediaElementSource(audio)
            source.connect(biquadFilter)
            biquadFilter.connect(analyser)
            analyser.connect(context.destination)

            audio.src = this.src
            // audio.play()

            const that = this
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
    }
}
</script>

<style lang="scss">
canvas {
    width: 100%;
    height: 50px;
    position: absolute;
}
</style>
