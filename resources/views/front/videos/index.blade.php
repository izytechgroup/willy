@extends('front.templates.pages.default')

@section('head')
    <title>Videos</title>
@endsection

@section('body')
<section class="videos-page">
    <div class="container">
        <div class="videos">
            <div class="search-container">
                <form class="form" action="" method="get">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" name="keywords"
                                    value="{{ Request::get('keywords') }}"
                                    class="form-control input-lg"
                                    placeholder="Rechercher une video"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-lg btn-red btn-block">
                                <i class="flaticon-search"></i> Recherche
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="main_lists">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="main">
                            @include('front.videos.' .$main->origin)
                            <div class="title">
                                {{ $main->title }}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="playlists">
                            <h4><i class="flaticon-minus"></i> Playlists</h4>

                            <ul class="list-unstyled">
                                @foreach ($playlists as $p)
                                    <li>
                                        <i class="flaticon-playlist"></i>
                                        <a href="?playlist={{ $p->number }}">{{ $p->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <h4><i class="flaticon-minus"></i> Videos</h4>

            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-sm-3">
                        <a href="{{ route('videos.one', $video->number) }}">
                            <div class="video">
                                <div class="play">
                                    <img src="/assets/img/play.png" alt="">
                                </div>
                                <img src="{{ $video->thumbnail }}" class="img-responsive">
                                <div class="title">
                                    {{ strtolower($video->title ) }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
