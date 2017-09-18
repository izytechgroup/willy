<?php $e = $event; ?>
@extends('front.templates.pages.default')

@section('head')
    <title>{{ $event->title }} | Willy Mix</title>
@endsection





@section('body')
<section class="event-page">
    <div class="container">

        <div class="link">
            <a href="/events">< Tous les events</a>
        </div>


        <div class="event">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ $event->flyer }}" alt="{{ $event->title }}" class="img-responsive">
                </div>

                <div class="col-sm-6">
                    <h4>{{ $event->title }}</h4>

                    <div class="details">
                        <ul class="list-unstyled">
                            <li class="capitalize">
                                <i class="flaticon-calendar"></i> {{ $e->frenchDate() }}
                            </li>

                            @if ($e->time)
                                <li>
                                    <i class="flaticon-time"></i> {{ $e->time }}
                                </li>
                            @endif

                            <li>
                                <i class="flaticon-location"></i> {{ $e->address }} -
                                {{ $e->country }}
                            </li>

                            <li>
                                <i class="flaticon-phone"></i> {{ $e->phones() }}
                            </li>

                            @if ($e->email)
                                <li>
                                    <i class="flaticon-mail-dark"></i> {{ $e->email }}
                                </li>
                            @endif

                            @if ($e->website)
                                <li>
                                    <i class="flaticon-broken-link"></i> {{ $e->website }}
                                </li>
                            @endif

                            <li class="mt-20">
                                Organisé par : {{ $e->organizer }}
                            </li>
                        </ul>


                        @if ($e->description)
                            <div class="paragraph">
                                <h5>A Propos</h5>
                                {!! $e->description !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="others">
            <h4><i class="flaticon-minus"></i> Autres events</h4>

            <div class="row">
                @foreach($events as $i)
                    <div class="col-sm-6">
                        <a href="/events/{{ $i->slug }}">
                            <div class="event">
                                <div class="image">
                                    <img src="{{ $i->smFlyer() }}" alt="{{ $i->title }}">
                                </div>

                                <div class="details">
                                    <h4>{{ $i->title }}</h4>

                                    <ul class="list-unstyled">
                                        <li class="capitalize">
                                            <i class="flaticon-calendar"></i> {{ $i->frenchDate() }}
                                        </li>

                                        <li>
                                            <i class="flaticon-location"></i> {{ $i->address }}
                                        </li>

                                        <li>
                                            <i class="flaticon-phone"></i> {{ $i->phones() }}
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
    </div>
</section>
@endsection
