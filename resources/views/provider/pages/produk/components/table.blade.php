<div class="produk-table-wrapper">

    <table class="produk-table">

        <!-- HEAD -->

        <thead>

            <tr>

                <th class="number-column">
                    No
                </th>

                <th>
                    Produk / Barang
                </th>

                <th>
                    Harga
                </th>

                <th>
                    Stok
                </th>

                <th>
                    Status Stok
                </th>

                <th>
                    Action
                </th>

            </tr>

        </thead>

        <!-- BODY -->

        <tbody>

        @foreach($produks as $produk)

        <tr>

            <td class="number-column">
                {{ $loop->iteration }}
            </td>

            <td>

                <div class="produk-info">

                    <img
                        src="{{ $produk->foto 
                            ? asset('storage/' . $produk->foto)
                            : 'https://via.placeholder.com/52'
                        }}"
                    >

                    <div>

                        <h4>
                            {{ $produk->nama_produk }}
                        </h4>

                        <p>
                            {{ $produk->deskripsi }}
                        </p>

                    </div>

                </div>

            </td>

            <td>
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </td>

            <td>
                {{ $produk->stok }}
            </td>

            <td>

                @if($produk->stok > 10)

                    <div class="stock-status aman">

                        <span></span>

                        Aman

                    </div>

                @elseif($produk->stok > 0)

                    <div class="stock-status aman">

                        <span></span>

                        Menipis

                    </div>

                @else

                    <div class="stock-status aman">

                        <span></span>

                        Habis

                    </div>

                @endif

            </td>

            <td>

                <div class="table-action">

                    <!-- EDIT -->

                    <button
                        class="edit-btn"
                        onclick="openEditModal({{ $produk->id }})"
                    >
                        <i class='bx bx-edit-alt'></i>
                    </button>

                    <!-- DELETE -->

                    <form
                        action="/provider/produk/delete/{{ $produk->id }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button class="delete-btn">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M3 6h18"/>
                                <path d="M8 6V4h8v2"/>
                                <path d="M19 6l-1 14H6L5 6"/>
                                <path d="M10 11v6"/>
                                <path d="M14 11v6"/>
                            </svg>

                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

<style>

/* =========================
    TABLE WRAPPER
========================== */

.produk-table-wrapper{

    background:
    rgba(255,255,255,0.82);

    backdrop-filter:blur(14px);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:24px;

    overflow:hidden;

    box-shadow:
    0 6px 20px rgba(15,23,42,0.04);

}

/* =========================
    TABLE
========================== */

.produk-table{

    width:100%;

    border-collapse:collapse;

}

/* =========================
    HEAD
========================== */

.produk-table thead{

    background:#fafafa;

}

.produk-table th{

    padding:18px 20px;

    font-size:13px;
    font-weight:700;

    color:#6b7280;

    text-align:left;

    border-bottom:
    1px solid #f1f5f9;

}

/* =========================
    BODY
========================== */

.produk-table td{

    padding:18px 20px;

    border-bottom:
    1px solid #f8fafc;

    font-size:13px;

    color:#374151;

}

/* =========================
    NUMBER COLUMN
========================== */

.number-column{

    width:70px;

    text-align:center;

    font-weight:700;

    color:#6b7280;

}

/* =========================
    PRODUK INFO
========================== */

.produk-info{

    display:flex;
    align-items:center;

    gap:14px;

}

.produk-info img{

    width:52px;
    height:52px;

    border-radius:14px;

    object-fit:cover;

    background:#f3f4f6;

}

.produk-info h4{

    font-size:14px;
    color:#111827;

    margin-bottom:4px;

}

.produk-info p{

    font-size:11px;
    color:#9ca3af;

}

/* =========================
    STOCK STATUS
========================== */

.stock-status{

    display:inline-flex;
    align-items:center;

    gap:8px;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;
    font-weight:700;

}

.stock-status span{

    width:8px;
    height:8px;

    border-radius:50%;

}

/* AMAN */

.stock-status.aman{

    background:#ecfdf3;

    color:#16a34a;

}

.stock-status.aman span{

    background:#22c55e;

}

/* =========================
    ACTION
========================== */

.table-action{

    display:flex;
    align-items:center;

    gap:10px;

}

.edit-btn{

    width:38px;
    height:38px;

    border:none;

    border-radius:12px;

    background:#fff7ed;

    color:#ff7a00;

    cursor:pointer;

    transition:0.3s ease;

}

.delete-btn{

    width:38px;
    height:38px;

    border:none;

    border-radius:12px;

    display:flex;
    justify-content:center;
    align-items:center;

    cursor:pointer;

    transition:0.3s ease;

    background:#fff1f2;

    color:#ef4444;

}

.edit-btn:hover,
.delete-btn:hover{

    transform:translateY(-2px);

}

</style>

<script>

function openEditModal(id){

    document
        .getElementById('editModal' + id)
        .classList.add('active');

    document.body.style.overflow = 'hidden';

}

function closeEditModal(id){

    document
        .getElementById('editModal' + id)
        .classList.remove('active');

    document.body.style.overflow = 'auto';

}

</script>