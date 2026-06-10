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
                Kelola kategori layanan dan
                penyedia layanan yang terhubung
                dengan kategori Servio.
            </p>

        </div>

        <button
            class="add-category-btn"
            onclick="openAddCategoryModal()"
        >
            + Tambah Kategori
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
    GLOBAL
========================= */

*{
    box-sizing:border-box;
}

html,
body{

    overflow-x:hidden;

    background:#f6f8fc;

    font-family:'Poppins',sans-serif;

}

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

    margin-bottom:32px;

    flex-wrap:wrap;

}

.page-title h1{

    font-size:42px;

    font-weight:800;

    color:#111827;

    margin-bottom:10px;

    letter-spacing:-1px;

}

.page-title p{

    font-size:16px;

    color:#6b7280;

    line-height:1.7;

}

/* =========================
    ADD BUTTON
========================= */

.add-category-btn{

    border:none;

    padding:16px 24px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:15px;
    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

    box-shadow:
    0 10px 24px rgba(255,122,0,0.18);

}

.add-category-btn:hover{

    transform:translateY(-2px);

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

@media(max-width:768px){

    .page-title h1{

        font-size:34px;

    }

    .table-wrapper{

        padding:18px;

    }

}

</style>

<script>

async function loadProviders(categoryId)
{
    const response = await fetch(
        `/admin/Kategori_Layanan/${categoryId}/providers`
    );

    const data = await response.json();

    document.getElementById(
        'providerModalTitle'
    ).innerText =
        'Penyedia Layanan ' +
        data.category;

    let html = '';

    data.providers.forEach(provider => {

        html += `
        <div class="provider-card">

            <div>
                <h4>${provider.name}</h4>
                <p>${provider.email}</p>
            </div>

            <form
                action="/admin/Kategori_Layanan/${categoryId}/provider/${provider.id}"
                method="POST"
            >
                @csrf
                @method('DELETE')

                <button
                    class="remove-provider-btn"
                >
                    Hapus
                </button>

            </form>

        </div>
        `;
    });

    document.getElementById(
        'providerList'
    ).innerHTML = html;

    openProviderModal();
}

</script>

@endsection