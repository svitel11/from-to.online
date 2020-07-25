@extends('app.app')
@section('title', 'Crypto Market Cap & Crypto Converter')
@section('meta')
    <meta property="og:url" content="https://from-to.online/cryptomarketcap">
    <meta property="og:title"         content="Crypto Market Cap & Crypto Converter" />
    <meta property="og:description"   content="Here is the section where you can find out how much your coin or token is worth. You can convert all existing crypto currencies." />
    {{--<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />--}}

    <meta name="description" content="Here is the section where you can find out how much your coin or token is worth. You can convert all existing crypto currencies." />
    <meta name="keywords" content="Coinmaketcap, Coins, Tokens, Crypto, Bitcoin, Ethereum, Ripple, BTC, ETH">
    <meta name="title" content="Crypto Market Cap & Crypto Converter">
@endsection
@section('content')
    @include('crypto.content')
@endsection

@section('aside')
    @include('crypto.aside')
@endsection
