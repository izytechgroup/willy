<template lang="html">
    <div class="willy-mix-player">
        <div class="container">
            <div class="progress">

            </div>


            <div class="controls">
                <div class="control" @click="previous()">
                    <i class="flaticon-previous-round"></i>
                </div>

                <div class="control play" v-show="!isPlaying" @click="play()">
                    <i class="flaticon-play-round"></i>
                </div>

                <div class="control play" v-show="isPlaying" @click="play()">
                    <i class="flaticon-pause-round"></i>
                </div>

                <div class="control" @click="next()">
                    <i class="flaticon-next-round"></i>
                </div>

                <div class="control" @click="mute()">
                    <i class="flaticon-mute" v-show="!isMute"></i>
                    <i class="flaticon-unmute" v-show="isMute"></i>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: 'willy-mix-player',
    data () {
        return {
            isRandom: false,
            isRepeat: false
        }
    },

    methods: {
        play () {
            this.$store.commit('TOGGLE_PLAY')
        },

        mute () {
            this.$store.commit('TOGGLE_MUTE')
        },

        next () {
            this.$store.dispatch('playNext')
        },

        previous () {
            this.$store.dispatch('playPrevious')
        }
    },

    computed: {
        isPlaying () {
            return this.$store.state.isPlaying
        },

        isMute () {
            return this.$store.state.isMute
        }
    }
}
</script>

<style lang="scss">
.willy-mix-player {
    width: 100%;
    background-color: white;
    position: fixed;
    bottom: 0;
    height: 60px;
    margin: 0;
    box-shadow: 2px 2px 2px rgba(0,0,0,0.3);
    z-index: 10;

    .progress {
        width: 100%;
        height: 2px;
        background-color: #fff;
    }

    .controls {
        width: 250px;
        float: left;
        padding: 1px 10px;

        .control {
            width:30px;
            float: left;
            font-size: 26px;
            cursor: pointer;
            color: #636d7e;
            margin-top:12px;
            margin-right: 5px;

            &.play {
                font-size: 35px;
                width: 40px;
                margin-top: 5px;
            }

            &.active {
                color: red;
            }
        }
    }
}
</style>
