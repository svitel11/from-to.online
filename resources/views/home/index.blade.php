@extends('app.app')
@section('title', 'Converter (Crypto, Data Storage, etc), Compressor (Images) and other useful tools')
@section('meta')
    <meta property="og:url"
          content="https://from-to.online">
    <meta property="og:title"
          content="Converter (Crypto, Data Storage, etc), Compressor (Images) and other useful tools" />
    <meta property="og:description"
          content="The purpose of the application is to provide a wide range of tools that will help you to convert crypto or data storage for example, but also in the conversion and compression of images.
                    The crypto toll also has other things to offer, such as the current value of crypto coins or crypto details and tips." />
    {{--<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />--}}

    <meta name="description"
          content="The purpose of the application is to provide a wide range of tools that will help you to convert crypto or data storage for example, but also in the conversion and compression of images.
                    The crypto toll also has other things to offer, such as the current value of crypto coins or crypto details and tips." />
    <meta name="description" content="With the Data Size Calculator you can calculate different units of measurement specific to the computers data. The following types can be calculated: Bit, Byte, Kilobit, Kilobyte, Megabit, Megabyte, Gigabit, Gigabyte, Terabit, Terabyte, Petabit, Petabyte" />
@endsection
@section('content')
    @include('home.content')
@endsection

@section('aside')
    @include('home.aside')
@endsection
