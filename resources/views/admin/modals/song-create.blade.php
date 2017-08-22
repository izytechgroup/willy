<div class="modal fade" tabindex="-1" role="dialog" id="songCreateModal">
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
                    <h3>Ajouter Piste Audio</h3>

                    <form class="form mt-20" action="{{ route('audio.playlist.song.add', $playlist->id) }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text" name="title" value="{{ old('title') }}"
                            required
                            placeholder="Titre de la piste"
                            class="form-control input-lg">
                        </div>

                        <div class="form-group">
                            <input type="text" name="link" value="{{ old('link') }}"
                            required
                            readonly
                            placeholder="Lien de la piste"
                            id="link"
                            class="form-control input-lg">
                        </div>



                        <div class="text-left">
                            <a href="/backend/filemanager/dialog.php?type=2&field_id=link" class="iframe-btn btn-dark btn btn-lg">
                                <i class='flaticon-folder'></i> Fichiers
                            </a>

                            <button type="submit" class="btn btn-lg btn-green pull-right">
                                <i class="flaticon-save"></i> Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
