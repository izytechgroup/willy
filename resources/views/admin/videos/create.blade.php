@extends('admin.body')


@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection

@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('videos.index') }}" class="btn btn-lg btn-grey">
                <i class="flaticon-undo"></i> Annuler
            </a>
        </div>

        <div class="title">
            Nouvelle Video
        </div>
    </div>

    <section class="mt-20">
        <div class="container-fluid">
            @include('errors.list')

            <form class="form" action="{{ route('videos.index') }}" method="post">
                {{ csrf_field() }}

                {{-- Left side  --}}
                <div class="row">
                    <div class="col-sm-8">
                        <div class="block">
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Playlist</label>
                                        <div class="form-select grey">
                                            <select class="" name="playlist_id">
                                                @foreach ($playlists as $p)
                                                    <option value="{{ $p->id }}">{{ $p->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-10">
                                    <input type="text" name="title" value="{{ old('title') }}"
                                    required
                                    placeholder="Titre de la video"
                                    id="slug-source"
                                    class="form-control input-lg">
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-select grey">
                                            <select class="" name="origin">
                                                <option value="youtube">Youtube</option>
                                                <option value="vimeo">Vimeo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="origin_id" value="{{ old('origin_id') }}"
                                            required
                                            placeholder="ID de la video"
                                            id="slug-source"
                                            class="form-control input-lg">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- End of col 9 --}}


                    <div class="col-sm-4">
                        <div class="block">
                            <div class="block-content">
                                <h3>Statut</h3>
                                <div class="form-select grey mt-10">
                                    <select class="" name="status">
                                        <option value="unpublished">Privé</option>
                                        <option value="published">Public</option>
                                    </select>
                                </div>

                                <div class="mt-20">
                                    <button type="submit" name="submit" class="btn btn-lg btn-blue btn-block">
                                        <i class="flaticon-check"></i> Sauvegarder
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End of col 3 --}}


                </div>

            </form>
        </div>
    </section>
@endsection


@section('js')
<script type="text/javascript" src="/backend/js/scripts.min.js"></script>
<script>
$(document).ready(function() {
    $('#slug-target').slugify('#slug-source');
})
</script>
@endsection
