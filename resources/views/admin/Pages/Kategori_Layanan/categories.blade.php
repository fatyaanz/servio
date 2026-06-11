@extends('admin.Layouts.app')

@section('content')

<div class="categories-page">

    <!-- =========================
        PAGE HEADER
    ========================= -->

    <div class="page-header">

        <div class="page-title">

            <h1>
                Kategori Layanan
            </h1>

           <p>
            Kelola kategori layanan dan penyedia layanan yang terhubung dengan platform Servio.
        </p>

        </div>

        <button
            class="add-category-btn"
            onclick="openAddCategoryModal()"
        >
            <i class='bx bx-plus'></i>
            Tambah Kategori
        </button>

    </div>

   {{-- STATS --}}
    @include(
        'admin.Pages.Kategori_Layanan.components.stats'
    )

    {{-- TABS --}}
    @include(
        'admin.Pages.Kategori_Layanan.components.nav-tabs'
    )

    {{-- CONTENT --}}
    @if(request('tab') == 'pending')

        @include(
            'admin.Pages.Kategori_Layanan.components.pending-category-cards'
        )

    @else

        <div class="table-wrapper">

            @include(
                'admin.Pages.Kategori_Layanan.components.categories-table'
            )

            @include(
                'admin.Pages.Kategori_Layanan.components.pagination'
            )

        </div>

    @endif

</div>

<!-- MODALS -->

@include(
    'admin.Pages.Kategori_Layanan.components.add-category-modal'
)

@include(
    'admin.Pages.Kategori_Layanan.components.provider-modal'
)

@include(
    'admin.Pages.Kategori_Layanan.components.reject-modal'
)

<style>
/* =========================
    PAGE
========================= */

.categories-page{
    min-height:100vh;
    padding-bottom:40px;
}

/* =========================
    HEADER
========================= */

.page-header{

    display:flex;

    justify-content:space-between;
    align-items:flex-start;

    gap:20px;

    margin-bottom:28px;

    flex-wrap:wrap;
}

.page-title h1{

    font-size:32px;

    font-weight:700;

    color:var(--text-dark);

    margin-bottom:6px;
}

.page-title p{

    font-size:14px;

    color:var(--text-secondary);

    line-height:1.6;

    max-width:600px;
}

/* =========================
    BUTTON
========================= */

.add-category-btn{

    display:flex;

    align-items:center;

    gap:8px;

    border:none;

    padding:12px 20px;

    border-radius:12px;

    background:var(--primary);

    color:white;

    font-size:14px;
    font-weight:600;

    cursor:pointer;

    transition:.3s;
}

.add-category-btn:hover{

    opacity:.95;

    transform:translateY(-2px);
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

@media(max-width:768px){

    .page-header{

        flex-direction:column;

        align-items:flex-start;
    }

    .page-title h1{

        font-size:28px;
    }

    .table-wrapper{

        padding:16px;
    }

}
</style>

@endsection