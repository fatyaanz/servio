<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitas</title>
</head>
<body>

    @include('user.navigation.navigation')

    @include('user.aktifitas.components.header')

    @include('user.aktifitas.components.tab-navigation')

    @if($bookings->isEmpty())

        <div class="empty-state">

            <div class="empty-icon">
                📦
            </div>

            <h2>Belum Ada Aktivitas</h2>

            <p>
                Kamu belum memiliki pesanan atau aktivitas apa pun.
                Pesanan yang dibuat akan muncul di halaman ini.
            </p>

        </div>

    @else

        @include(
            'user.aktifitas.components.activity-card',
            ['bookings' => $bookings]
        )

    @endif

</body>
</html>

<style>

.empty-state{

    background:#fff;

    margin:20px;

    padding:80px 30px;

    border-radius:24px;

    text-align:center;

    border:1px solid #F1F5F9;

    box-shadow:
        0 4px 20px rgba(15,23,42,.05);

}

.empty-icon{

    font-size:72px;

    margin-bottom:20px;

}

.empty-state h2{

    color:#0F172A;

    font-size:28px;

    font-weight:700;

    margin-bottom:12px;

}

.empty-state p{

    color:#64748B;

    font-size:15px;

    line-height:1.8;

    max-width:450px;

    margin:auto;

}

@media(max-width:768px){

    .empty-state{

        margin:15px;

        padding:60px 20px;

    }

    .empty-icon{

        font-size:56px;

    }

    .empty-state h2{

        font-size:22px;

    }

}

</style>