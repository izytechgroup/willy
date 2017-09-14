<?php setlocale(LC_TIME, "fr_FR");?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/assets/css/app.min.css?{{ time() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <meta name="robots" content="index,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png"  href="/favicon.ico">
        <title>Willy Mix</title>
        @include('front.includes.favicons')
        <script>
            var _auth = <?php echo json_encode(Auth::check() ? Auth::user()->api_token : '');?>;
        </script>
    </head>
    <body>
        <div class="home" id="app">

            <section class="home-top">
                <ul id="lightSlider">
                    @foreach($images as $img)
                        <li data-thumb="{{ $img }}">
                            <img src="{{ $img }}" />
                        </li>
                    @endforeach
                </ul>
            </section>


            <nav class="navbar navbar-default">
                @include('front.includes.nav')
            </nav>




            {{-- section audio  --}}
            <section class="brand-new-audio">
                <div class="container">
                    <h2>#New Audio</h2>


                    <div class="row">
                        <div class="col-sm-8">
                            <h4><i class="flaticon-minus"></i> Songs</h4>

                            <div class="songs">
                                @foreach ($songs as $song)
                                    <a href="/audio#/song/{{ $song->number }}">
                                        <div class="song">
                                            <div class="cover">
                                                <img src="{{ $song->playlist->cover }}" alt="" class="img-responsive">
                                            </div>

                                            <div class="details">
                                                <div class="play">
                                                    <i class="flaticon-play-round"></i>
                                                </div>


                                                <div class="title">
                                                    {{ $song->title }}
                                                </div>

                                                <div class="metas">
                                                    <ul class="list-inline">
                                                        <li><i class="flaticon-time"></i> {{ $song->duration }}</li>
                                                        <li><i class="flaticon-headphones"></i> {{ $song->plays }}</li>
                                                        <li><i class="flaticon-download"></i> {{ $song->downloads }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                {{-- End of first song  --}}

                            </div>
                        </div>
                        {{-- End of songs  --}}


                        <div class="col-sm-4">
                            <h4><i class="flaticon-minus"></i> Playlists</h4>

                            <div class="playlists">
                                <div class="row">
                                    @foreach ($playlists as $playlist)
                                        <div class="col-sm-6">
                                            <a href="">
                                                <div class="playlist">
                                                    <div class="bg">
                                                        <div class="cover">
                                                            <img src="{{ $playlist->cover }}" class="img-responsive">
                                                        </div>
                                                        <div class="details">
                                                            <div class="title">
                                                                {{ $playlist->title }}
                                                            </div>

                                                            <div class="metas">
                                                                <ul class="list-inline">
                                                                    <li><i class="flaticon-sound"></i> {{ sizeof($playlist->songs)}} Titres</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="more">
                        <a href="/audio">
                            <i class="flaticon-minus"></i>
                            Toute la musique
                        </a>
                    </div>

                </div>
            </section>



            {{-- Section video  --}}
            <section class="brand-new-videos">
                {{-- <div class="overlay"></div> --}}
                <div class="container">
                    <h2>#New Videos</h2>
                    <div class="row mt-20">
                        @if (sizeof($videos) > 0)
                            <div class="col-sm-6">
                                <a href="">
                                    <div class="main-video">
                                        <div class="play">
                                            <img src="/assets/img/play.png" alt="">
                                        </div>
                                        <img src="{{ $videos[0]->thumbnail }}">

                                        <div class="title">
                                            {{ strtolower($videos[0]->title ) }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif

                        {{-- End main video  --}}

                        <div class="col-sm-6">
                            <div class="videos">
                                <div class="row">
                                    @foreach ($videos as $video)
                                        <div class="col-sm-6">
                                            <a href="">
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
                    </div>

                    <div class="more">
                        <a href="/videos">
                            <i class="flaticon-minus"></i>
                            Toutes les vidéos
                        </a>
                    </div>
                </div>
            </section>



            {{-- Section events  --}}
            <section class="events">
                <div class="container">
                    <h2>#Events</h2>

                    <div class="row mt-20">
                        @foreach($events as $e)
                            <div class="col-sm-6">
                                <a href="">
                                    <div class="event">
                                        <div class="image">
                                            <img src="{{ $e->smFlyer() }}" alt="{{ $e->title }}">
                                        </div>

                                        <div class="details">
                                            <h4>{{ $e->title }}</h4>

                                            <ul class="list-unstyled">
                                                <li class="capitalize">
                                                    <i class="flaticon-calendar"></i> {{ $e->frenchDate() }}
                                                </li>

                                                <li>
                                                    <i class="flaticon-location"></i> {{ $e->address }}
                                                </li>

                                                <li>
                                                    <i class="flaticon-phone"></i> {{ $e->phones() }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>


        @include('front.includes.footer')
        <script src="/assets/js/app.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#lightSlider").lightSlider({
                item: 1,
                slideMargin: 0,
                pager: false,
                enableTouch:true,
                enableDrag:true,
                auto: true,
                pauseOnHover: true,
                pause: 5000,
                gallery: false,
                speed: 900,
                loop: true
            });
        });
        </script>
    </body>
</html>
