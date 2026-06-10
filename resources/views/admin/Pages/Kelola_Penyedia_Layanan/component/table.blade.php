<table>

    <tr>

        <th>Penyedia</th>

        <th>Kategori</th>

        <th>Lokasi</th>

        <th>Rating</th>

        <th>Status</th>

        <th>Bergabung</th>

        <th>Aksi</th>

    </tr>

        @include(
            'admin.Pages.Kelola_Penyedia_Layanan.component.table-row'
        )



</table>

<style>
    /* =========================
    TABLE
========================= */

table{

    width:100%;

    border-collapse:separate;

    border-spacing:0 12px;

}

th{

    text-align:left;

    padding:0 14px 10px;

    font-size:13px;
    font-weight:700;

    color:#94a3b8;

    white-space:nowrap;

}

td{

    padding:18px 14px;

    background:#fafafa;

    vertical-align:middle;

    font-size:14px;

    color:#475569;

    transition:0.25s ease;

}

tr td:first-child{

    border-radius:18px 0 0 18px;

}

tr td:last-child{

    border-radius:0 18px 18px 0;

}

tr:hover td{

    background:#fff7ed;

}
</style>