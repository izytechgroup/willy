<div class="modal fade" tabindex="-1" role="dialog" id="videoDeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="content mt-20 fs-16">
                    <h2>Sûr de vouloir supprimer la video ?</h2>

                    <div class="text-center mt-20">
                        <button class="btn btn-lg btn-green" data-dismiss="modal">
                            Non, Annuler
                        </button>
                    </div>

                    <div class="text-center mt-20">
                        <a href="{{ route('admin.video.delete', $video->number) }}" class="btn btn-red">
                            Oui, Supprimer
                        </a>
                    </div>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
