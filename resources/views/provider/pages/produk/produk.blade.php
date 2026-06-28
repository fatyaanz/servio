@extends('provider.layouts.app')

@section('content')


<div class="produk-container">

    <div class="produk-wrapper">

        {{-- HEADER --}}
        @include('provider.pages.produk.components.header')

        {{-- CONTENT --}}
        <div class="produk-content">

            {{-- STATS --}}
            @include('provider.pages.produk.components.stats')

            {{-- FILTER --}}
            @include('provider.pages.produk.components.filter')

            {{-- TABLE --}}
            @include('provider.pages.produk.components.table')

            <div class="pagination-wrapper" style="margin-top: 20px;">
                {{ $produks->appends(request()->query())->links() }}
            </div>

        </div>

    </div>

</div>
@include('provider.pages.produk.components.modal-tambah')
@include('provider.pages.produk.components.edit-produk')

<style>

/* =========================
    CONTAINER
========================== */

.produk-container{

    width:100%;

    display:flex;
    justify-content:center;

}

/* =========================
    WRAPPER
========================== */

.produk-wrapper{

    width:100%;
    max-width:1400px;

    display:flex;
    flex-direction:column;

    gap:20px;

    padding-bottom:40px;

}

/* =========================
    CONTENT
========================== */

.produk-content{

    display:flex;
    flex-direction:column;

    gap:22px;

    margin-top:140px;

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:992px){

    .produk-content{

        margin-top:120px;

    }

}

</style>

@endsection