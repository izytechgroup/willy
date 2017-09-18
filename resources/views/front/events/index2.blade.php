@extends('front.templates.pages.default')

@section('head')
    <title>Evènements | Willy Mix</title>
@endsection

@section('body')
<section class="events-page">
    <div class="container">
        <h4><i class="flaticon-minus"></i> Events</h4>

        <div class="">
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
            {{-- End of search  --}}




            <div class="mt-20">
                @foreach ($events->chunk(2) as $chunks)
                    <div class="row">
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

        </div>
    </div>
</section>
@endsection
