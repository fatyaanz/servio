<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penyedia Layanan</title>
</head>
<body>



    {{-- Header --}}
    @include('user.provider.components.provider-header')

    {{-- Informasi Provider --}}
   @include(
        'user.provider.components.provider-info',
        ['provider' => $provider]
    )

    {{-- Tentang Provider --}}
    @include('user.provider.components.provider-about')

    {{-- Statistik --}}
    @include('user.provider.components.provider-statistics')

    {{-- Review --}}
    @include('user.provider.components.provider-review')

    {{-- Booking Bar --}}
    @include(
        'user.provider.components.booking-bar',
        ['provider' => $provider]
    )

</body>
</html>