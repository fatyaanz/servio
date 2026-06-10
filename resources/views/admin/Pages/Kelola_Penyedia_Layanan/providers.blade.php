@extends('admin.layouts.app')

@section('content')

<div class="provider-page">

    <div class="page-header">

        <div class="page-title">

            <h1>
                Penyedia Layanan
            </h1>

            <p>
                Kelola semua penyedia layanan
                yang terdaftar pada platform Servio.
            </p>

        </div>

    </div>

    {{-- STATS --}}
    @include(
        'admin.Pages.Kelola_Penyedia_Layanan.component.stats'
    )

    {{-- NAV TABS --}}
    @include(
        'admin.Pages.Kelola_Penyedia_Layanan.component.nav-tabs'
    )

    {{-- PENDING PAGE --}}
    @if(request('status') == 'pending')

        @include(
            'admin.Pages.Kelola_Penyedia_Layanan.component.pending-cards'
        )

    {{-- ACTIVE & SUSPENDED --}}
    @else

        <div class="table-wrapper">

            {{-- FILTERS --}}
            @include(
                'admin.Pages.Kelola_Penyedia_Layanan.component.filters'
            )

            {{-- TABLE --}}
            @include(
                'admin.Pages.Kelola_Penyedia_Layanan.component.table'
            )

            {{-- PAGINATION --}}
            @include(
                'admin.Pages.Kelola_Penyedia_Layanan.component.pagination'
            )

        </div>

    @endif

</div>

{{-- REJECT MODAL --}}
@include(
    'admin.Pages.Kelola_Penyedia_Layanan.component.reject-modal'
)

<style>

/* =========================
    GLOBAL
========================= */

*{
    box-sizing:border-box;
}

html,
body{

    overflow-x:hidden;

    scroll-behavior:smooth;

    background:#f6f8fc;

    font-family:'Poppins',sans-serif;

}

/* =========================
    SCROLLBAR
========================= */

::-webkit-scrollbar{
    width:10px;
}

::-webkit-scrollbar-track{
    background:#f3f4f6;
}

::-webkit-scrollbar-thumb{

    background:linear-gradient(
        180deg,
        #ffb066,
        #ff7a00
    );

    border-radius:20px;

}

/* =========================
    PAGE CONTAINER
========================= */

.provider-page{

    min-height:100vh;

    padding-bottom:40px;

}

/* =========================
    PAGE HEADER
========================= */

.page-header{

    display:flex;

    justify-content:space-between;
    align-items:flex-start;

    margin-bottom:32px;

}

.page-title h1{

    font-size:42px;

    font-weight:800;

    color:#111827;

    margin-bottom:8px;

    letter-spacing:-1px;

}

.page-title p{

    color:#6b7280;

    font-size:16px;

}

/* =========================
    TABLE WRAPPER
========================= */

.table-wrapper{

    background:white;

    border-radius:28px;

    padding:24px;

    border:1px solid #eef2f7;

    box-shadow:
    0 10px 28px rgba(15,23,42,0.05);

    overflow:hidden;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:992px){

    .table-wrapper{

        padding:18px;

    }

}

</style>

@endsection