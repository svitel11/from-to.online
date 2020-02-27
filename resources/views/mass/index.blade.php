@extends('app.app')
@section('title', 'Mass/Weight Converter')
@section('meta')
    <meta property="og:url" content="https://from-to.online/massconverter">
    <meta property="og:title"         content="Mass/Weight Converter" />
    <meta property="og:description"   content="Following mass units are available for conversion: <i>Microgram (mcg), Milligram (mg), Gram (g), Kilogram (kg), Metric Tonne (mt), Ounce (oz), Pound (lb) and Ton (t)" />
    {{--<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />--}}

    <meta name="description" content="Following mass units are available for conversion: <i>Microgram (mcg), Milligram (mg), Gram (g), Kilogram (kg), Metric Tonne (mt), Ounce (oz), Pound (lb) and Ton (t)" />
    <meta name="keywords" content="Massconverter, Weightconverter, Microgram (mcg), Milligram (mg), Gram (g), Kilogram (kg), Metric Tonne (mt), Ounce (oz), Pound (lb), Ton (t)">
    <meta name="title" content="Mass/Weight Converter">
@endsection
@section('content')
    @include('mass.content')
@endsection

@section('aside')
    @include('mass.aside')
@endsection
