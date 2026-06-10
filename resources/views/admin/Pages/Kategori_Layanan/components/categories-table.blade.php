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
                <td colspan="6" style="text-align:center;padding:40px;">
                    Belum ada kategori layanan
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

<style>

/* =========================
    TABLE
========================= */

.category-table{

    width:100%;

    border-collapse:separate;

    border-spacing:0 16px;

}

/* =========================
    HEAD
========================= */

.category-table thead th{

    text-align:left;

    padding:0 18px 14px;

    font-size:14px;

    font-weight:700;

    color:#94a3b8;

    white-space:nowrap;

}

/* =========================
    BODY
========================= */

.category-table tbody td{

    background:#fafafa;

    padding:22px 18px;

    vertical-align:middle;

    font-size:15px;

    color:#475569;

    transition:0.25s ease;

}

/* =========================
    RADIUS
========================= */

.category-table tbody tr td:first-child{

    border-radius:20px 0 0 20px;

}

.category-table tbody tr td:last-child{

    border-radius:0 20px 20px 0;

}

/* =========================
    HOVER
========================= */

.category-table tbody tr:hover td{

    background:#fff7ed;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:992px){

    .category-table{

        min-width:1000px;

    }

}

</style>