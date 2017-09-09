<template lang="html">
    <router-link :to="{ name: 'playlist', params: { id: playlist.number }}">
        <div class="item">
            <img :src="playlist.cover">
            <div class="details">
                <h5>{{ playlist.title }}</h5>

                <ul class="list-unstyled">
                    <li><i class="flaticon-sound"></i> {{ playlist.songs_count }} Titre{{ hasMany ? 's': '' }}</li>
                    <li>
                        <i class="flaticon-playlist"></i> Afficher la playlist
                    </li>
                </ul>
            </div>
        </div>
    </router-link>
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
