<template lang="html">
    <div class="item">
        <a href="">
            <img :src="playlist.cover">
        </a>

        <div class="details">
            <h5><a href="">{{ playlist.title }}</a></h5>

            <ul class="list-unstyled">
                <li><i class="flaticon-sound"></i> {{ playlist.songs_count }} Titre{{ hasMany ? 's': '' }}</li>
                <li>
                    <a href="">
                        <i class="flaticon-playlist"></i> Afficher la playlist
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'playlist',
    props: ['playlist'],

    computed: {
        hasMany () {
            return this.playlist.songs_count > 1
        }
    }
}
</script>
