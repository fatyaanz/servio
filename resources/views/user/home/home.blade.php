<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Servio
    </title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'
        rel='stylesheet'
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/servio-design-system.css') }}"
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

body{

    margin:0;

    background:#F8F9FB;

    font-family:'Poppins',sans-serif;

}

.home-page{

    padding:20px;

    padding-bottom:100px;

}

</style>