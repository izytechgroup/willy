<template>
    <div class="enquiry-modal">
        <div class="modal fade" id="songDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1>Sûr de vouloir supprimer la piste?</h1>

                        <div class="text-center">
                            <a href="" data-dismiss="modal" class="btn btn-lg btn-green">
                                Non, annuler
                            </a>
                        </div>

                        <form class="form mt-20" @submit.prevent="deleteSong()">
                            <div class="text-center">

                                <button type="submit" class="btn btn-red">
                                    Oui, supprimer
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
    name: 'admin-songs-delete',
    props: ['song'],

    data () {
        return {
            isLoading: false
        }
    },

    methods: {
        deleteSong () {
            this.$emit('deleted', this.song)
            window.$('#songDeleteModal').modal('hide');
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
