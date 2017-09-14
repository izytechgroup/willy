<template>
    <div class="enquiry-modal">
        <div class="modal fade" id="songEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1>Editer la piste</h1>


                        <form class="form mt-20" @submit.prevent="checkBeforeSubmit()">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select class="form-control input-lg" name="can_download" v-model="song.can_download">
                                            <option value="1">Téléchargeable</option>
                                            <option value="0">Non Téléchargeable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="artist"
                                            required
                                            v-model="song.artist"
                                            placeholder="Nom de l'artiste"
                                            class="form-control input-lg">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="title"
                                            required
                                            v-model="song.title"
                                            placeholder="Titre de la piste"
                                            class="form-control input-lg">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="genre"
                                            v-model="song.genre"
                                            placeholder="Genre"
                                            required
                                            class="form-control input-lg">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="duration"
                                            v-model="song.duration"
                                            required
                                            placeholder="Durée Ex: 59:59"
                                            class="form-control input-lg">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="size"
                                            v-model="song.size"
                                            required
                                            placeholder="Taille en MB"
                                            class="form-control input-lg">
                                    </div>
                                </div>
                            </div>
                            <!-- End of row  -->

                            <div class="form-group">
                                <input type="text" name="link"
                                    v-model="song.link"
                                    placeholder="Lien de la piste"
                                    class="form-control input-lg">
                            </div>



                            <div class="text-right">

                                <button type="submit" class="btn btn-lg btn-green" :disabled="isLoading">
                                    <i class="flaticon-save mr-10"></i>
                                    <span v-show="!isLoading">Sauvegarder</span>
                                    <span v-show="isLoading">Sauvegarde en cours</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'admin-songs-edit',
    props: ['song'],

    data () {
        return {
            isLoading: false
        }
    },

    methods: {
        updateSong () {
            this.isLoading = true
            axios.put('/api/admin/songs/', this.song)
            .then((res) => {
                this.isLoading = false
                window.$('#songEditModal').modal('hide')
            })
        },

        checkBeforeSubmit () {
            if (this.song.link !== undefined && this.song.link !== null && this.song.link !== '') {
                this.updateSong()
            }
        }
    }
}
</script>

<style lang="scss" scoped>

.enquiry-modal {
    h2 {
        text-align: center;
        margin: 0;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    h4 {
        font-weight: 400;
        font-size: 18px;
        margin-top:20px;
        text-transform: uppercase;
        font-family: 'Open Sans', 'Maven Pro', Calibri, sans-serif;
    }

    textarea {
        resize: none;
    }
}


</style>
