<template lang="html">
    <div class="block">
        <div class="block-content">
            <h3>Playlist</h3>

            <div class="songs mt-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Durée</th>
                            <th>Lectures</th>
                            <th>Téléchargements</th>
                        </tr>
                    </thead>

                    <tbody>
                            <tr v-for="s in songs">
                                <td>
                                    <a @click="editSong(s)"><i class="flaticon-pencil"></i></a>
                                    {{ s.title }}
                                </td>
                                <td>{{ s.duration }}</td>
                                <td>{{ s.plays }}</td>
                                <td>{{ s.downloads }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <songEditModal :song="song"></songEditModal>
    </div>
</template>

<script>
import songEditModal from './edit'

export default {
    name: 'admin-songs',
    components: {
        songEditModal
    },

    data () {
        return {
            songs: [],
            song: {}
        }
    },

    mounted () {
        this.songs = _songs
    },

    methods: {
        editSong(s) {
            this.song = s
            window.$('#songEditModal').modal('show');
        }
    }
}
</script>

<style lang="scss" scoped>
tbody {
    tr > td > a {
        cursor: pointer;
    }
}
</style>
