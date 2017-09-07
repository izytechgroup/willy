<template lang="html">
    <div class="willy-mix-player">
        <div class="container">
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
                    <i class="flaticon-mute" v-show="isMute"></i>
                    <i class="flaticon-unmute" v-show="!isMute"></i>
                </div>
            </div>

            <div class="cover">
                <img :src="song.cover" alt="">
            </div>

            <div class="progress">
                <div class="current" :style="'width:' + current + '%'"></div>
                <div class="infos">
                    <div class="title">{{ song.title }}</div>
                    <div class="time">{{ elapsed | duration }} - {{ duration | duration }}</div>
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
        },

        song () {
            return this.$store.state.song
        },

        elapsed () {
            return this.$store.state.elapsed
        },

        duration () {
            return this.$store.state.duration
        },

        current () {
            return this.elapsed / this.duration * 100
        }
    },

    mounted () {
        $('.progress').on('click', function(e) {
            var barX = e.pageX - this.offsetLeft
            var percent = $(this).width() / (barX);
            eventBus.$emit('player.seek', percent)
        });
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
    box-shadow: 2px 2px 2px rgba(0,0,0,0.5);
    z-index: 10;

    .progress {
        display: block;
        margin-left:230px;
        height: 60px;
        background-color: #fff;
        cursor: pointer;
        position: relative;

        .current {
            position: absolute;
            background-color: rgba(0,0,0,0.12);
            height: 60px;
        }

        .infos {
            width: 100%;
            text-align: center;
            font-family: 'Source Sans Pro', 'Open Sans';
            padding-top: 10px;

            .title {
                font-size: 16px;
                font-weight: 400;
                width: 100%;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .time {
                font-size: 14px;
                color: #636d7e;
                font-weight: 400;
            }
        }
    }

    .controls {
        width: 170px;
        float: left;
        padding: 1px 10px;

        .control {
            width:30px;
            float: left;
            font-size: 26px;
            cursor: pointer;
            color: #636d7e;
            margin-top:8px;
            margin-right: 5px;

            &.play {
                font-size: 35px;
                width: 40px;
                margin-top: 2px;
            }

            &.active {
                color: red;
            }
        }
    }

    .cover {
        width:60px;
        height: 60px;
        float: left;

        img {
            width: 100%;
        }
    }
}
</style>
