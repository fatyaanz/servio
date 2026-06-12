<div class="table-container">
    <table>

        @if($providers->isEmpty())

<tr>

    <td colspan="7" class="empty-table">

        <i class='bx bx-package'></i>

        <p>
            Belum ada data penyedia layanan
        </p>

    </td>

</tr>

@endif

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
</div>

<style>

    .empty-table{
    text-align:center;

    padding:40px 20px;

    background:white;
}

.empty-table i{
    font-size:36px;

    color:var(--text-secondary);
}

.empty-table p{
    margin-top:10px;

    color:var(--text-secondary);
}
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

    padding:0 14px 12px;

    font-size:13px;
    font-weight:600;

    color:var(--text-secondary);

    white-space:nowrap;
}

td{
    padding:16px 14px;

    background:white;

    vertical-align:middle;

    font-size:14px;

    color:var(--text-dark);

    border-top:1px solid #f3f4f6;
    border-bottom:1px solid #f3f4f6;

    transition:.3s;
}

tr td:first-child{
    border-radius:20px 0 0 20px;

    border-left:1px solid #f3f4f6;
}

tr td:last-child{
    border-radius:0 20px 20px 0;

    border-right:1px solid #f3f4f6;
}

tr:hover td{
    background:#FFF4E6;
}

.table-container{
    overflow-x:auto;
}
</style>