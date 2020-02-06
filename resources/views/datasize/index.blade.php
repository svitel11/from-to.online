@extends('app.app')
@section('title', 'Data Size Calculator')
@section('meta')
    <meta name="description" content="With the Data Size Calculator you can calculate different units of measurement specific to the computers data. The following types can be calculated: Bit, Byte, Kilobit, Kilobyte, Megabit, Megabyte, Gigabit, Gigabyte, Terabit, Terabyte, Petabit, Petabyte" />
    <meta name="keywords" content="Data-Size, Computer-Data, Bit, Byte, Kilobit, Kilobyte, Megabit, Megabyte, Gigabit, Gigabyte, Terabit, Terabyte, Petabit, Petabyte">
@endsection
@section('content')
    @include('datasize.content')
@endsection

@section('aside')
    @include('datasize.aside')
@endsection
