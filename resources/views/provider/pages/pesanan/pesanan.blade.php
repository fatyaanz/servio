@extends('provider.layouts.app')

@section('content')

    @include('provider.pages.pesanan.components.header')

    @include('provider.pages.pesanan.components.tab-navigation')

    @forelse($bookings as $booking)

        @include(
            'provider.pages.pesanan.components.order-card',
            ['booking' => $booking]
        )

    @empty

        <div class="empty-state">

            <div class="empty-icon">
                <i class='bx bx-package' style="font-size:60px;color:#cbd5e1;"></i>
            </div>

            <h2>Belum Ada Pesanan Masuk</h2>

            <p>
                Saat ini belum ada pesanan dari pelanggan.
                Pesanan baru akan muncul di halaman ini.
            </p>

        </div>

    @endforelse

@endsection

<style>

.empty-state{

    background:#fff;

    margin:20px;

    padding:70px 30px;

    border-radius:24px;

    text-align:center;

    border:1px solid #F1F5F9;

    box-shadow:
        0 4px 20px rgba(15,23,42,.05);

}

.empty-icon{

    font-size:70px;

    margin-bottom:20px;

}

.empty-state h2{

    color:#0F172A;

    font-size:28px;

    font-weight:700;

    margin-bottom:10px;

}

.empty-state p{

    color:#64748B;

    font-size:15px;

    max-width:450px;

    margin:auto;

    line-height:1.7;

}

@media(max-width:768px){

    .empty-state{

        margin:15px;

        padding:50px 20px;

    }

    .empty-icon{

        font-size:55px;

    }

    .empty-state h2{

        font-size:22px;

    }

}

</style>