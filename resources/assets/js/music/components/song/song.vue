<template lang="html">
    <div class="song">
        <div class="cover">
            <img src="https://static.gigwise.com/gallery/5209864_8262181_JasonDeruloTatGall.jpg" alt="">
        </div>

        <div class="details">
            <div class="play">
                <i class="flaticon-play-round"></i>
            </div>


            <div class="title">
                Bikutsi Mix Non Stop 2017 Lady Ponce Coco Argentee
            </div>

            <div class="metas">
                <ul class="list-inline">
                    <li><i class="flaticon-time"></i> 12:04</li>
                    <li><i class="flaticon-headphones"></i> 57</li>
                    <li><i class="flaticon-download"></i> 22</li>
                </ul>
            </div>
        </div>


        <equalizer></equalizer>
    </div>
</template>

<script>
import equalizer from '../player/equalizer'

export default {
    name: 'song',
    components: {
        equalizer
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
