@extends('provider.layouts.app')

@section('content')

@include('provider.pages.pesanan.components.header')

@include('provider.pages.pesanan.components.tab-navigation')

@if($bookings->isEmpty())

    @include(
        'provider.pages.pesanan.components.empty-state'
    )

@else

    @include(
        'provider.pages.pesanan.components.history-card',
        ['bookings' => $bookings]
    )

@endif

@endsection