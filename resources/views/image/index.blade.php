@extends('app.app')
@section('title', 'Image Converter')
@section('meta')

    <meta property="og:title"         content="Image Converter" />
    <meta property="og:description"   content="With the Image Converter you can change the extension of your image. Here you can change extensions like JPEG, PNG, GIF, etc. Other than that, you can reduce the image quality if you want an image that takes up less storage space." />
    {{--<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />--}}

    <meta name="description" content="With the Image Converter you can change the extension of your image. Here you can change extensions like JPEG, PNG, GIF, etc. Other than that, you can reduce the image quality if you want an image that takes up less storage space." />
    <meta name="keywords" content="Image, Converter, JPGtoPNG, JPGtoGIF, GIFtoJPG, Compress-Image, Foto-Converter, Image-Compress">
@endsection
@section('content')
    @include('image.content')
@endsection

@section('aside')
    @include('image.aside')
@endsection
