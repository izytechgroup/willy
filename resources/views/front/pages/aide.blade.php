@extends('front.templates.pages.single')

@section('head')
    <title>Aide | Willy Mix</title>
@endsection


@section('body')
    <section class="page">
        <div class="container">
            <div class="page-container">
                <div class="title">
                    Aide
                </div>


                <div class="row">
                    <div class="col-sm-9">
                        <div class="content">
                            {!! $p->content !!}
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="content">
                            <img src="/assets/img/sc.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
