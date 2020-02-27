@extends('app.app')
@section('title', 'Data Size Converter')
@section('meta')
    <meta property="og:url" content="https://from-to.online/datasize">
    <meta property="og:title"         content="Data Size Converter" />
    <meta property="og:description"   content="Use this data storage conversion tool to convert instantly between: Bit, Byte, Kilobit, Kilobyte, Megabit, Megabyte, Gigabit, Gigabyte, Terabit, Terabyte, Petabit, Petabyte" />
    {{--<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />--}}

    <meta name="description" content="Use this data storage conversion tool to convert instantly between: Bit, Byte, Kilobit, Kilobyte, Megabit, Megabyte, Gigabit, Gigabyte, Terabit, Terabyte, Petabit, Petabyte" />
    <meta name="keywords" content="Data-Size, Computer-Data, Bit, Byte, Kilobit, Kilobyte, Megabit, Megabyte, Gigabit, Gigabyte, Terabit, Terabyte, Petabit, Petabyte">
    <meta name="title" content="Data Size Converter">
@endsection
@section('content')
    @include('datasize.content')
@endsection

@section('aside')
    @include('datasize.aside')
@endsection
