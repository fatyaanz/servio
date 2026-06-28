@extends('provider.layouts.app')

@section('content')

<div class="dashboard-container">

    <div class="dashboard-wrapper">

        {{-- HEADER --}}
        @include('provider.pages.dashboard.components.header')

        @if(Auth::user()->is_online === false)
            {{-- OFFLINE STATE --}}
            <div class="offline-state-container">
                <div class="offline-box">
                    <i class='bx bx-sleepy'></i>
                    <h2>Anda sedang Offline</h2>
                    <p>Kamu dalam keadaan offline dan tidak dapat menerima pesanan apapun saat ini. Aktifkan status Online di kanan atas untuk mulai menerima pesanan kembali.</p>
                </div>
            </div>
        @else
            {{-- STATS --}}
            @include('provider.pages.dashboard.components.stats')

            {{-- CHART --}}
            @include('provider.pages.dashboard.components.chart')

            {{-- ORDER --}}
            <div class="dashboard-grid">

                {{-- ORDER MASUK --}}
                @include('provider.pages.dashboard.components.ordermasuk')

                {{-- ORDER AKTIF --}}
                @include('provider.pages.dashboard.components.orderaktif')

            </div>

            {{-- RATING --}}
            @include('provider.pages.dashboard.components.rating')
        @endif
    </div>

</div>

<style>

    /* =========================
        CONTAINER
    ========================== */

    .dashboard-container{

        width:100%;

        display:flex;
        justify-content:center;

    }

    /* =========================
        WRAPPER
    ========================== */

    .dashboard-wrapper{

        width:100%;
        max-width:1350px;

        display:flex;
        flex-direction:column;
        
        gap:18px; /* Reduced from 24px */

        padding-bottom:40px;

    }

    /* =========================
        GRID
    ========================== */

    .dashboard-grid{
        display:grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px; /* Reduced from 24px */
        align-items:stretch; /* Make Order Masuk & Order Aktif equal height */
    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:1200px){

        .dashboard-grid{

            grid-template-columns:1fr;

        }

    }

    /* =========================
        OFFLINE STATE
    ========================== */
    .offline-state-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 20px;
    }

    .offline-box {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 24px;
        padding: 50px 40px;
        text-align: center;
        max-width: 500px;
        box-shadow: 0 10px 40px rgba(15, 23, 42, 0.05);
    }

    .offline-box i {
        font-size: 70px;
        color: #94a3b8;
        margin-bottom: 20px;
        display: inline-block;
    }

    .offline-box h2 {
        font-size: 22px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 12px;
    }

    .offline-box p {
        font-size: 14px;
        color: #64748b;
        line-height: 1.6;
    }

</style>

<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection