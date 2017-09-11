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

            <nav class="navbar navbar-default">
                @include('front.includes.nav')
            </nav>


            {{-- Section events  --}}
            <section class="events">

                <div class="container">
                    <h2>#Events</h2>

                    <div class="search-container">
                        <form class="form" action="" method="get">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="keywords"
                                            value="{{ Request::get('keywords') }}"
                                            class="form-control input-lg"
                                            placeholder="Rechercher un event"
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

                    @foreach ($events->chunk(2) as $chunks)
                        <div class="row mt-20 pb-20">
                            @foreach($chunks as $e)
                                <div class="col-sm-6">
                                    <a href="/events/{{ $e->slug }}">
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

                    @endforeach
                </div>
            </section>

        </div>


        @include('front.includes.footer')
        <script src="/assets/js/app.min.js"></script>
    </body>
</html>
