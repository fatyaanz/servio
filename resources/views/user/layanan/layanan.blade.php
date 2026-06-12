<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyedia Layanan</title>
</head>
<body>


    @include('user.layanan.components.header')

    @include('user.layanan.components.filter-bar')

    @include(
        'user.layanan.components.provider-grid',
        ['providers' => $providers]
    )

</body>
</html>