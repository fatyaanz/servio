<div class="table-container">

    <table class="category-table">

        <thead>

            <tr>

                <th>
                    Kategori
                </th>

                <th>
                    Jumlah Penyedia
                </th>

                <th>
                    Penyedia Layanan
                </th>

                <th>
                    Dibuat Pada
                </th>

                <th>
                    Status
                </th>

                <th>
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($categories as $category)

                @include(
                    'admin.Pages.Kategori_Layanan.components.category-row'
                )

            @empty

                <tr>

                    <td colspan="6" class="empty-table">

                        <div class="empty-content">

                            <i class='bx bx-category'></i>

                            <h4>
                                Belum Ada Kategori
                            </h4>

                            <p>
                                Tambahkan kategori layanan pertama untuk mulai mengelola provider.
                            </p>

                        </div>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<style>

/* =========================
    TABLE CONTAINER
========================= */

.table-container{

    width:100%;

    overflow-x:auto;

}

/* =========================
    TABLE
========================= */

.category-table{

    width:100%;

    border-collapse:separate;

    border-spacing:0 12px;

}

/* =========================
    HEADER
========================= */

.category-table th{

    text-align:left;

    padding:0 14px 12px;

    font-size:13px;

    font-weight:600;

    color:var(--text-secondary);

    white-space:nowrap;

}

/* =========================
    BODY
========================= */

.category-table td{

    padding:16px 14px;

    background:white;

    vertical-align:middle;

    font-size:14px;

    color:var(--text-dark);

    border-top:1px solid #f3f4f6;

    border-bottom:1px solid #f3f4f6;

    transition:.3s;

}

/* =========================
    RADIUS
========================= */

.category-table tr td:first-child{

    border-radius:20px 0 0 20px;

    border-left:1px solid #f3f4f6;

}

.category-table tr td:last-child{

    border-radius:0 20px 20px 0;

    border-right:1px solid #f3f4f6;

}

/* =========================
    HOVER
========================= */

.category-table tbody tr:hover td{

    background:#FFF4E6;

}

/* =========================
    EMPTY STATE
========================= */

.empty-table{

    background:white !important;

    padding:60px 20px !important;

    text-align:center;

}

.empty-content{

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

}

.empty-content i{

    font-size:56px;

    color:var(--primary);

    margin-bottom:12px;

}

.empty-content h4{

    font-size:18px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:6px;

}

.empty-content p{

    font-size:14px;

    color:var(--text-secondary);

    max-width:320px;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:992px){

    .category-table{

        min-width:950px;

    }

}

</style>