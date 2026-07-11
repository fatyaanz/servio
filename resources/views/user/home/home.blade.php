<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Servio - Beranda
    </title>

    <meta name="description" content="Servio - Platform layanan perbaikan elektronik dan servis rumah tangga terpercaya.">

    <link
        rel="stylesheet"
        href="{{ asset('css/servio-design-system.css') }}"
    >

    <link
        href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'
        rel='stylesheet'
    >

</head>

<body>

    <div class="home-page">

        {{-- HEADER --}}
        @include('user.home.components.header')

        {{-- SEARCH --}}
        @include('user.home.components.search-bar')

        {{-- ACTIVE BOOKING --}}
        @if($activeBooking)
            @include('user.home.components.active-booking', ['booking' => $activeBooking])
        @endif

        {{-- CATEGORY --}}
        @include(
            'user.home.components.category-section',
            ['categories' => $categories]
        )

        {{-- FREQUENTLY SEARCHED --}}
        @include('user.home.components.frequently-searched-section')

        {{-- PROVIDER --}}
        @include('user.home.components.provider-section')
        

    </div>

    {{-- BOTTOM NAVIGATION --}}
    @include('user.navigation.navigation')

</body>

</html>

<style>

.home-page{

    max-width:1200px;
    margin:0 auto;

    padding:24px;

    padding-bottom:100px;

}

</style>