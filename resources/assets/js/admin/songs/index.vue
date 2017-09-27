<template lang="html">
    <div class="block">
        <div class="block-content">
            <h3>Playlist</h3>

            <div class="songs mt-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Titre</th>
                            <th>Durée</th>
                            <th>Lectures</th>
                            <th>Téléchargements</th>
                        </tr>
                    </thead>

                    <tbody>
                            <tr v-for="s in songs">
                                <td class="pointer" @click="confirmDelete(s)">
                                    <i class="flaticon-trash"></i>
                                </td>
                                <td @click="editSong(s)" class="pointer">
                                    <i class="flaticon-pencil"></i>
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
        <songDeleteModal :song="song" v-on:deleted="deleteSongFromArray"></songDeleteModal>
    </div>
</template>

<script>
import songEditModal from './edit'
import songDeleteModal from './delete'

export default {
    name: 'admin-songs',
    components: {
        songEditModal,
        songDeleteModal
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
        },

        confirmDelete (s) {
            this.song = s
            window.$('#songDeleteModal').modal('show');
        },

        deleteSongFromArray(e) {
            for (var i = 0; i < this.songs.length; i++) {
                if (this.songs[i].id == e.id) {
                    this.songs.splice(i, 1)
                    this.deleteSongFromServer()
                    break;
                }
            }
            console.log('delete song from index.vue', e);
        },

        deleteSongFromServer () {
            axios.delete('/api/admin/songs/' + this.song.id)
            .then((res) => {
                this.$toastr.success('Success', 'La piste a été supprimée avec succès');
            })
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
