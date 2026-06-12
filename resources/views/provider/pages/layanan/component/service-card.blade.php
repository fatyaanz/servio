@php

    $category = $service->category;

@endphp

<div class="service-card">

    <!-- LEFT -->

    <div class="service-left">

        <div class="service-icon">

            🔧

        </div>

        <h3>

            {{ $category->name }}

        </h3>

        <div class="service-rating">

            ⭐ 4.9

        </div>

        <div class="service-status">

            <span>
                Status Layanan
            </span>

            <span class="status-badge">

                Aktif

            </span>

        </div>

    </div>

    <!-- RIGHT -->

    <div class="service-right">

        <div class="service-header">

            <div class="sub-count">

                {{ $service->subServices->count() }}
                Sub Layanan

            </div>

            <button
                class="add-btn"
                onclick="openKelolaModal(
                    {{ $service->id }}
                )"
            >

                + Tambah Layanan

            </button>

        </div>

        <table class="service-table">

            <thead>

                <tr>

                    <th>
                        Sub Layanan
                    </th>

                    <th>
                        Harga Range
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse(
                    $service->subServices
                    as $sub
                )

                <tr>

                    <td>

                        {{ $sub->name }}

                    </td>

                    <td class="price">

                        Rp{{ number_format(
                            $sub->price_min,
                            0,
                            ',',
                            '.'
                        ) }}

                        -

                        Rp{{ number_format(
                            $sub->price_max,
                            0,
                            ',',
                            '.'
                        ) }}

                    </td>

                    <td>

                        <div class="action-group">

                            <button
                                class="edit-btn"
                                onclick="
                                openEditModal(
                                    {{ $sub->id }},
                                    '{{ $sub->name }}',
                                    '{{ $sub->price_min }}',
                                    '{{ $sub->price_max }}',
                                    '{{ $sub->description }}'
                                )"
                            >

                                ✏️

                            </button>

                            <form
                                action="{{ route(
                                    'provider.subservice.delete',
                                    $sub->id
                                ) }}"
                                method="POST"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    class="delete-btn"
                                    onclick="
                                    return confirm(
                                        'Hapus sub layanan?'
                                    )
                                    "
                                >

                                    🗑️

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="3"
                        class="empty-row"
                    >

                        Belum ada sub layanan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<style>
    /* =========================
   CARD
========================= */

.service-card{

    background:#fff;

    border-radius:28px;

    padding:30px;

    display:flex;

    gap:32px;

    margin-bottom:24px;

    border:1px solid #f1f5f9;

    box-shadow:
        0 10px 35px rgba(15,23,42,.06);

    transition:.3s ease;

}

.service-card:hover{

    transform:translateY(-3px);

    box-shadow:
        0 18px 40px rgba(15,23,42,.10);

}

/* =========================
   LEFT
========================= */

.service-left{

    width:260px;

    flex-shrink:0;

}

.service-icon{

    width:90px;
    height:90px;

    border-radius:24px;

    background:linear-gradient(
        135deg,
        #FFF4E8,
        #FFE7C7
    );

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:40px;

    margin-bottom:20px;

}

.service-left h3{

    font-size:32px;

    font-weight:800;

    color:#111827;

    margin-bottom:10px;

}

.service-rating{

    display:inline-flex;

    align-items:center;

    gap:6px;

    background:#FFFBEB;

    color:#D97706;

    padding:8px 14px;

    border-radius:999px;

    font-weight:700;

    margin-bottom:24px;

}

.service-status{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding-top:14px;

    border-top:1px solid #f1f5f9;

}

.service-status span:first-child{

    color:#64748B;

    font-size:14px;

}

.status-badge{

    background:#ECFDF3;

    color:#16A34A;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;

}

/* =========================
   RIGHT
========================= */

.service-right{

    flex:1;

}

/* =========================
   HEADER
========================= */

.service-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:18px;

}

.sub-count{

    background:#FFF4E8;

    color:#FF8A00;

    padding:10px 16px;

    border-radius:12px;

    font-weight:700;

    font-size:14px;

}

.add-btn{

    border:none;

    background:linear-gradient(
        135deg,
        #FFA63D,
        #FF8A00
    );

    color:white;

    padding:12px 18px;

    border-radius:14px;

    cursor:pointer;

    font-weight:700;

    transition:.25s ease;

}

.add-btn:hover{

    transform:translateY(-2px);

    box-shadow:
        0 10px 25px rgba(255,138,0,.25);

}

/* =========================
   TABLE WRAPPER
========================= */

.service-table{

    width:100%;

    border-collapse:separate;

    border-spacing:0;

    overflow:hidden;

    border-radius:18px;

    border:1px solid #f1f5f9;

}

/* =========================
   TABLE HEADER
========================= */

.service-table thead{

    background:#F8FAFC;

}

.service-table th{

    padding:18px;

    text-align:left;

    color:#64748B;

    font-size:13px;

    font-weight:700;

}

/* =========================
   TABLE BODY
========================= */

.service-table td{

    padding:18px;

    border-top:1px solid #F1F5F9;

    vertical-align:middle;

}

.service-table tbody tr{

    transition:.2s ease;

}

.service-table tbody tr:hover{

    background:#FCFCFD;

}

/* =========================
   PRICE
========================= */

.price{

    color:#FF8A00;

    font-weight:800;

    font-size:15px;

}

/* =========================
   ACTION
========================= */

.action-group{

    display:flex;

    gap:10px;

}

.edit-btn{

    width:42px;
    height:42px;

    border:none;

    border-radius:12px;

    background:#FFF4E8;

    cursor:pointer;

    transition:.2s ease;

    font-size:16px;

}

.edit-btn:hover{

    transform:translateY(-2px);

    background:#FFE6C4;

}

.delete-btn{

    width:42px;
    height:42px;

    border:none;

    border-radius:12px;

    background:#FEE2E2;

    cursor:pointer;

    transition:.2s ease;

    font-size:16px;

}

.delete-btn:hover{

    transform:translateY(-2px);

    background:#FECACA;

}

/* =========================
   EMPTY
========================= */

.empty-row{

    text-align:center;

    color:#94A3B8;

    padding:30px !important;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:1000px){

    .service-card{

        flex-direction:column;

        padding:22px;

    }

    .service-left{

        width:100%;

    }

    .service-header{

        flex-direction:column;

        align-items:flex-start;

        gap:12px;

    }

}

@media(max-width:768px){

    .service-table{

        display:block;

        overflow-x:auto;

    }

}
</style>

