<template lang="html">
    <div class="willy-mix-player">
        <div class="progress">

        </div>


        <div class="controls">
            <div class="control">
                <i class="flaticon-left"></i>
            </div>

            <div class="control play" v-show="!isPlaying" @click="play()">
                <i class="flaticon-play-round"></i>
            </div>

            <div class="control play" v-show="isPlaying" @click="play()">
                <i class="flaticon-pause-round"></i>
            </div>

            <div class="control">
                <i class="flaticon-right"></i>
            </div>

            <div class="control">
                <i class="flaticon-menu"></i>
            </div>
        </div>


        <div class="">

        </div>
    </div>
</template>

<script>

export default {
    name: 'willy-mix-player',
    data () {
        return {
            isPlaying: false,
            isRandom: false,
            isRepeat: false
        }
    },

    methods: {
        play () {
            this.isPlaying = !this.isPlaying
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
            font-size: 22px;
            cursor: pointer;
            color: #636d7e;
            margin-top:14px;

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
