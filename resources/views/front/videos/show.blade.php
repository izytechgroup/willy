@extends('front.templates.pages.default')

@section('head')
    <title>{{ $video->title }} | Willy Mix</title>
@endsection

@section('body')
<section class="videos-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-lg-9">
                <div class="main-video">
                    <form class="form" action="/videos" method="get">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="keywords"
                                        class="form-control input-lg"
                                        placeholder="Rechercer une video"
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

                    <div class="player mt-10">
                        @include('front.includes.' .$video->origin)

                        <div class="title">
                            {{ $video->title }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-3">
                <div class="playlist">
                    <h4>Playlist</h4>

                    @foreach ($playlist as $video)
                        <a href="{{ route('videos.one', $video->number) }}">
                            <div class="item">
                                <img src="https://img.{{ $video->origin }}.com/vi/{{ $video->origin_id }}/mqdefault.jpg">
                                <div class="title">
                                    {{ strtolower($video->title ) }}
                                </div>
                            </div>
                        </a>
                        <div class="clearfix"></div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="videos mt-40">
            <h4>Autres Videos</h4>
            
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-sm-3">
                        <a href="{{ route('videos.one', $video->number) }}">
                            <div class="video">
                                <div class="play">
                                    <img src="/assets/img/play.png" alt="">
                                </div>
                                <img src="https://img.{{ $video->origin }}.com/vi/{{ $video->origin_id }}/mqdefault.jpg" class="img-responsive">
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
