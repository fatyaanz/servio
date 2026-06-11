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

    font-size:32px;

    font-weight:800;

    color:#111827;

    margin-bottom:8px;

    letter-spacing:-1px;

}

.page-title p{
    color:var(--text-secondary);
    font-size:14px;
}

/* =========================
    TABLE WRAPPER
========================= */
.table-wrapper{
    background:white;
    border-radius:20px;
    padding:20px;
    border:1px solid var(--border);
    box-shadow:var(--shadow-sm);
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