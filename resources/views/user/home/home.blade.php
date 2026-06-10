<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servio - Home</title>
</head>
<body>

    {{-- Navigation --}}
    @include('user.navigation.navigation')

    {{-- Header --}}
    @include('user.home.components.header')

    {{-- Search Bar --}}
    @include('user.home.components.search-bar')

    {{-- Category --}}
    @include(
        'user.home.components.category-section',
        ['categories' => $categories]
    )

    {{-- Promo --}}
    @include('user.home.components.promo-section')

    {{-- Frequently Searched --}}
    @include('user.home.components.frequently-searched-section')

    @include('user.home.components.provider-section')

</body>
</html>