@extends('front.templates.app.body')

@section('head')
    <title>Audio</title>
@endsection

@section('body')
<section class="audio-page">
    <div id="music"></div>
</section>
@endsection


@section('js')
<script src="/assets/js/music.min.js"></script>
@endsection
