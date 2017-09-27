@extends('front.templates.pages.default')

@section('head')
    <title>Evènements | Willy Mix</title>
@endsection

@section('body')
<section class="events-page">
    <div class="container">
        <h4><i class="flaticon-minus"></i> Events</h4>

        <div class="">


            <div class="row">
                <div class="col-sm-3">
                    <form class="form" action="" method="get">
                        <div class="form-group">
                            <input type="text" name="keywords"
                                value="{{ Request::get('keywords') }}"
                                class="form-control input-lg input-white"
                                placeholder="Ex: titre, ville, adresse, etc">
                        </div>

                        <div class="form-group">
                            <input type="text" name="type"
                                value="{{ Request::get('type') }}"
                                class="form-control input-lg input-white"
                                placeholder="Type d'events">
                        </div>

                        <div class="">
                            <select class="form-select" name="month">
                                <option value="">Mois</option>
                                <option value="01" {{ request('month') == '01' ? 'selected' : '' }}>Janvier</option>
                                <option value="02" {{ request('month') == '02' ? 'selected' : '' }}>Février</option>
                                <option value="03" {{ request('month') == '03' ? 'selected' : '' }}>Mars</option>
                                <option value="04" {{ request('month') == '04' ? 'selected' : '' }}>Avril</option>
                                <option value="05" {{ request('month') == '05' ? 'selected' : '' }}>Mai</option>
                                <option value="06" {{ request('month') == '06' ? 'selected' : '' }}>Juin</option>
                                <option value="07" {{ request('month') == '07' ? 'selected' : '' }}>Juillet</option>
                                <option value="08" {{ request('month') == '08' ? 'selected' : '' }}>Août</option>
                                <option value="09" {{ request('month') == '09' ? 'selected' : '' }}>Septembre</option>
                                <option value="10" {{ request('month') == '10' ? 'selected' : '' }}>Octobre</option>
                                <option value="11" {{ request('month') == '11' ? 'selected' : '' }}>Novembre</option>
                                <option value="12" {{ request('month') == '12' ? 'selected' : '' }}>Décembre</option>
                            </select>
                        </div>

                        <div class="">
                            <select class="form-select" name="country">
                                <option value="">Pays</option>
                                @foreach (Helper::getCountries() as $c)
                                    <option value="{{ $c }}" {{ request('country') == $c ? 'selected' : '' }}>{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>


                        <button type="submit" class="btn btn-lg btn-red btn-block">
                            <i class="flaticon-search"></i> Recherche
                        </button>
                    </form>
                </div>
                {{-- End of col 4 --}}

                <div class="col-sm-9">
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
            </div>
            {{-- End of row  --}}

        </div>
    </div>
</section>
@endsection
