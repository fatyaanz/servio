<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
</head>
<body>

     @include('user.navigation.navigation')
    @include('user.aktifitas.components.header')

    @include('user.aktifitas.components.tab-navigation-riwayat')

    @include('user.aktifitas.components.riwayat-filter')

    @include(
        'user.aktifitas.components.history-card',
        ['bookings' => $bookings]
    )

    @include('user.aktifitas.components.history-card')


</body>
</html>