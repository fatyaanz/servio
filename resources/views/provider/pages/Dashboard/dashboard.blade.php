@extends('provider.layouts.app')

@section('content')

<div class="dashboard-container">

    <div class="dashboard-wrapper">

        {{-- HEADER --}}
        @include('provider.pages.dashboard.components.header')

        {{-- STATS --}}
        @include('provider.pages.dashboard.components.stats')

        {{-- ORDER --}}
        <div class="dashboard-grid">

            {{-- ORDER MASUK --}}
            @include('provider.pages.dashboard.components.ordermasuk')

            {{-- ORDER AKTIF --}}
            @include('provider.pages.dashboard.components.orderaktif')

        </div>

        {{-- RATING --}}
        @include('provider.pages.dashboard.components.rating')

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
        
        gap:24px;
        

        padding-bottom:40px;

    }

    /* =========================
        GRID
    ========================== */

    .dashboard-grid{

        display:grid;

    grid-template-columns:minmax(0, 2fr) 500px;

    gap:10px;

    align-items:start;

    }

    /* =========================
        RESPONSIVE
    ========================== */

    @media(max-width:1200px){

        .dashboard-grid{

            grid-template-columns:1fr;

        }

    }

</style>

@endsection