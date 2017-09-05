<template lang="html">
    <div class="item">
        <a href="">
            <img :src="playlist.cover">
        </a>

        <div class="details">
            <h5><a href="">{{ playlist.title }}</a></h5>

            <ul class="list-unstyled">
                <li><i class="flaticon-sound"></i> {{ playlist.songs_count }} Titres</li>
                <li>
                    <a href="">
                        <i class="flaticon-play-2"></i> Lire Tout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'playlist',
    props: ['playlist']
}
</script>

<style lang="scss" scoped>
</style>
