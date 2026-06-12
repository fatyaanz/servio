<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $provider->name }} | Servio
    </title>
</head>
<body>

<div class="provider-detail-page">

    {{-- HEADER --}}
    @include(
        'user.provider.components.provider-header',
        ['provider' => $provider]
    )

    <div class="provider-container">

        {{-- INFO --}}
        @include(
            'user.provider.components.provider-info',
            ['provider' => $provider]
        )

        {{-- ABOUT --}}
        @include(
            'user.provider.components.provider-about',
            ['provider' => $provider]
        )

        {{-- STATISTICS --}}
        @include(
            'user.provider.components.provider-statistics',
            ['provider' => $provider]
        )

        {{-- REVIEW --}}
        @include(
            'user.provider.components.provider-review',
            ['provider' => $provider]
        )

    </div>

    {{-- BOOKING BAR --}}
    @include(
        'user.provider.components.booking-bar',
        ['provider' => $provider]
    )

</div>

</body>
</html>

<style>

/* =========================
   PAGE
========================= */

.provider-detail-page{

    min-height:100vh;

    background:#f8fafc;

    padding-bottom:120px;

}

/* =========================
   CONTAINER
========================= */

.provider-container{

    max-width:1400px;

    margin:0 auto;

    padding:0 30px;

}

/* =========================
   SECTION SPACING
========================= */

.provider-container > *{

    margin-bottom:24px;

}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .provider-container{

        padding:0 20px;

    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .provider-container{

        padding:0 15px;

    }

    .provider-detail-page{

        padding-bottom:140px;

    }

}

</style>