<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/assets/css/app.min.css?{{ time() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <meta name="robots" content="index,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png"  href="/favicon.ico">
        @include('front.includes.favicons')
        @yield('head')
        <script>
            var _auth = <?php echo json_encode(Auth::check() ? Auth::user()->api_token : '');?>;
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            @include('front.includes.nav')
        </nav>

        <div id="app">
            @yield('body')
        </div>

        @include('front.includes.footer')
        <script src="/assets/js/app.min.js"></script>
        @yield('js')
    </body>
</html>
