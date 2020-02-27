@extends('app.app')
@section('title', 'Crypto, Data Storage, Image, Weight - Converter')
@section('meta')
    <meta property="og:url"
          content="https://from-to.online">
    <meta property="og:title"
          content="Crypto, Data Storage, Image, Weight - Converter" />
    <meta property="og:description"
          content="The application provide a wide range of tools that can help you to convert crypto or data storage for example, but also in the conversion and compression of images.
                    The crypto toll also has other things to offer, such as the current value of crypto coins or crypto details and tips." />
    {{--<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />--}}

    <meta name="description"
          content="The application provide a wide range of tools that can help you to convert crypto or data storage for example, but also in the conversion and compression of images.
                    The crypto toll also has other things to offer, such as the current value of crypto coins or crypto details and tips." />
    <meta title="Crypto, Data Storage, Image, Weight - Converter">
@endsection
@section('content')
    @include('home.content')
@endsection

@section('aside')
    @include('home.aside')
@endsection
