@extends('admin.body')


@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
@endsection

@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('videos.create') }}" class="btn btn-lg btn-green">
                <i class="flaticon-cross"></i> Nouvelle Video
            </a>
            <a href="{{ route('videos.index') }}" class="btn btn-lg btn-grey">
                <i class="flaticon-undo"></i> Annuler
            </a>
        </div>

        <div class="title">
            Editer la video
        </div>
    </div>

    <section class="mt-20">
        <div class="container-fluid">
            @include('errors.list')

            {!! Form::model($video, ['method' => 'PATCH', 'route' => ['videos.update', $video->id], 'class' => 'form' ]) !!}

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
                                                    <option value="{{ $p->id }}" {{ $p->id == $video->playlist_id ? 'selected': '' }}>{{ $p->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::text('title', null, [
                                        'class' => 'form-control input-lg',
                                        'required' => 'required',
                                        'placeholder' => 'Titre de la video']) !!}
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        {!! Form::select('origin',
                                            ['youtube' => 'Youtube', 'vimeo' => 'Vimeo'],
                                            $video->origin, ['class' => 'form-control input-lg']) !!}
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            {!! Form::text('origin_id', null, [
                                                'class' => 'form-control input-lg',
                                                'required' => 'required',
                                                'placeholder' => 'Titre de la video']) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="block">
                            <div class="block-content">
                                @include('admin.videos.' .$video->origin)
                            </div>
                        </div>
                    </div>
                    {{-- End of col 9 --}}


                    <div class="col-sm-4">
                        <div class="block">
                            <div class="block-content">
                                <h3>Statut</h3>
                                {!! Form::select('status',
                                    ['unpublished' => 'Privé', 'published' => 'Public'],
                                    $video->status, ['class' => 'form-control input-lg mt-10']) !!}

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

            {!! Form::close() !!}
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
