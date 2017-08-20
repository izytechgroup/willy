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
    </head>
    <body>
        <div class="home">

            <section class="home-top">
                <div class="container">
                    <div class="logo">
                        <a href="/"><img src="/assets/img/logo.png" alt="Logo Willy Mix"></a>
                    </div>

                    <h1>Willy <span>Mix</span></h1>
                    <h4>Bienvenue dans mon univers</h4>
                </div>
            </section>

            @include('front.includes.nav')


            {{-- section audio  --}}
            <section class="brand-new-audio">
                <div class="container">
                    <h2>#New Audio</h2>


                    <div class="row">
                        <div class="col-sm-8">
                            <h4><i class="flaticon-minus"></i> Songs</h4>

                            <div class="songs">
                                <a href="">
                                    <div class="song">
                                        <div class="cover">
                                            <img src="https://static.gigwise.com/gallery/5209864_8262181_JasonDeruloTatGall.jpg" alt="">
                                        </div>

                                        <div class="details">
                                            <div class="play">
                                                <i class="flaticon-play-round"></i>
                                            </div>


                                            <div class="title">
                                                Bikutsi Mix Non Stop 2017 Lady Ponce Coco Argentee
                                            </div>

                                            <div class="metas">
                                                <ul class="list-inline">
                                                    <li><i class="flaticon-time"></i> 12:04</li>
                                                    <li><i class="flaticon-headphones"></i> 57</li>
                                                    <li><i class="flaticon-download"></i> 22</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                {{-- End of first song  --}}


                                <a href="">
                                    <div class="song">
                                        <div class="cover">
                                            <img src="https://static.gigwise.com/gallery/5209864_8262181_JasonDeruloTatGall.jpg" alt="">
                                        </div>

                                        <div class="details">
                                            <div class="play">
                                                <i class="flaticon-play-round"></i>
                                            </div>


                                            <div class="title">
                                                Bikutsi Mix Non Stop 2017 Lady Ponce Coco Argentee
                                            </div>

                                            <div class="metas">
                                                <ul class="list-inline">
                                                    <li><i class="flaticon-time"></i> 12:04</li>
                                                    <li><i class="flaticon-headphones"></i> 57</li>
                                                    <li><i class="flaticon-download"></i> 22</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- End of songs  --}}


                        <div class="col-sm-4">
                            <h4><i class="flaticon-minus"></i> Playlists</h4>

                            <div class="playlists">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="">
                                            <div class="playlist">
                                                <div class="bg">
                                                    <div class="cover">
                                                        <img src="https://static.gigwise.com/gallery/5209864_8262181_JasonDeruloTatGall.jpg" class="img-responsive">
                                                    </div>
                                                    <div class="details">
                                                        <div class="title">
                                                            Mix Audio
                                                        </div>

                                                        <div class="metas">
                                                            <ul class="list-inline">
                                                                <li><i class="flaticon-sound"></i> 22 Titres</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- end of first album  --}}

                                    <div class="col-sm-6">
                                        <a href="">
                                            <div class="playlist">
                                                <div class="bg">
                                                    <div class="cover">
                                                        <img src="http://6uh9u7hhy8-flywheel.netdna-ssl.com/wp-content/uploads/2016/03/beyonce-formation-tracklist-1.jpg" class="img-responsive">
                                                    </div>
                                                    <div class="details">
                                                        <div class="title">
                                                            Audio DJ
                                                        </div>

                                                        <div class="metas">
                                                            <ul class="list-inline">
                                                                <li><i class="flaticon-sound"></i> 13 Titres</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="more">
                        <a href="/videos">
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
                        <div class="col-sm-6">
                            <a href="">
                                <div class="main-video">
                                    <div class="play">
                                        <img src="/assets/img/play.png" alt="">
                                    </div>
                                    <img src="https://img.youtube.com/vi/sY5zP9eKPWk/mqdefault.jpg">

                                    <div class="title">
                                        {{ strtolower('COLLER LA PETITE AWILO BANA C4 ARAFAT WILLY MIX SERGE BEYNAUD DEBORDEAU SHADO CHRIST JOSÉ BABAH') }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- End main video  --}}

                        <div class="col-sm-6">
                            <div class="videos">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="">
                                            <div class="video">
                                                <div class="play">
                                                    <img src="/assets/img/play.png" alt="">
                                                </div>

                                                <img src="https://img.youtube.com/vi/h7iO7xIPMIA/mqdefault.jpg" class="img-responsive">

                                                <div class="title">
                                                    {{ strtolower('WILLY Mix MAKOSSA AOUT 2017 DORA DECA , PETIT PAYS ,SERGEO POLO,LONGUE LONGUE') }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6">
                                        <a href="">
                                            <div class="video">
                                                <div class="play">
                                                    <img src="/assets/img/play.png" alt="">
                                                </div>

                                                <img src="https://img.youtube.com/vi/3Ahx-hzez1w/mqdefault.jpg" class="img-responsive">


                                                <div class="title">
                                                    {{ strtolower('MIX VIDEO BENSKIN AOUT 2017 " GERARD BEN PASSY LA NOBLESSE WILLY Mix NAT LA BOMBE DJ MARTIAL') }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6">
                                        <a href="">
                                            <div class="video">
                                                <img src="https://img.youtube.com/vi/leNooW4ZpqY/mqdefault.jpg" class="img-responsive">
                                                <div class="title">
                                                    HIT CAMER VIDEO MIX SEPTEMBRE 2017 BY WILLY Mix
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-6">
                                        <a href="">
                                            <div class="video">
                                                <img src="https://img.youtube.com/vi/Ykh2Bw2I7KE/mqdefault.jpg" class="img-responsive">
                                                <div class="title">
                                                    WILLY MIX COUPÉ DÉCALÉ VOL 213
                                                </div>
                                            </div>
                                        </a>
                                    </div>
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

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">
                                <div class="event">
                                    <div class="image">
                                        <img src="/assets/img/e1.jpg">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </body>
</html>
