<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="msvalidate.01" content="1B85E202125C114886139BD8CB4898CF" />
        @yield('meta')
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Poiret+One|Reenie+Beanie&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/vue.js')}}"></script>
</html>
