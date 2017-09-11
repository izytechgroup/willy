@extends('front.templates.pages.single')

@section('head')
    <title>Location | Willy Mix</title>
@endsection


@section('body')
    <section class="page">
        <div class="container">
            <div class="page-container">
                <div class="title">
                    Location
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="content">
                            {!! $p->content !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <ul id="lightSlider">
                            @foreach($images as $img)
                                <li data-thumb="{{ $img }}">
                                    <img src="{{ $img }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
