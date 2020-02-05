<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>From-To</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{public_path('assets/css/app.css')}}" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Poiret+One|Reenie+Beanie&display=swap" rel="stylesheet">
        <!-- Styles -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156658061-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-156658061-1');
        </script>

    </head>
    <body class="fixed-sn white-skin">
        @include('app.nav-top')
        <div class="container">
            <!-- ADS TOP Bilboard-->
            <div class="row">
                <div class="col s12"></div>
            </div>
            <!-- Page Content goes here -->
        <div class="row">
            <div class="col s12 m7 l8 content">@yield('content')</div>
            <div class="col s12 m5 l4 content-ad">@yield('aside')</div>
        </div>
        </div>
    @include('app.footer')
    </body>
    <script src="{{public_path('assets/js/app.js')}}"></script>
    <script src="{{public_path('assets/js/vue.js')}}"></script>
</html>
