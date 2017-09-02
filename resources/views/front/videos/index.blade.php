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
            </div>


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
