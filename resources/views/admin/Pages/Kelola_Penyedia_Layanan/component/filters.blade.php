<div class="filter-section">

    <div class="filters">

        <!-- STATUS -->

        <select class="filter-select">

            <option>
                Semua Status
            </option>

            <option>
                Aktif
            </option>

            <option>
                Ditangguhkan
            </option>

        </select>

        <!-- KATEGORI -->

        <select class="filter-select">

            <option>
                Semua Kategori
            </option>

        </select>

        <!-- KOTA -->

        <select class="filter-select">

            <option>
                Semua Kota
            </option>

        </select>

    </div>

    <!-- EXPORT -->

    <button class="export-btn">
        Export
    </button>

</div>

<style>
    .filter-section{

    display:flex;

    justify-content:space-between;
    align-items:center;

    gap:18px;

    margin-bottom:24px;

    flex-wrap:wrap;

}

.filters{
    display:flex;
    gap:16px;
    flex-wrap:wrap;
}

.filter-select{

    padding:13px 18px;

    border:1px solid #e5e7eb;

    border-radius:14px;

    min-width:180px;

    background:#fafafa;

    font-size:14px;
    font-weight:500;

    color:#475569;

    outline:none;

    transition:0.25s ease;

}

.filter-select:hover,
.filter-select:focus{

    border-color:#ffb066;

    background:white;

}

.export-btn{

    padding:13px 24px;

    border:none;

    border-radius:14px;

    background:linear-gradient(
        135deg,
        #ff9a3d,
        #ff7a00
    );

    color:white;

    font-size:14px;
    font-weight:600;

    cursor:pointer;

    transition:0.3s ease;

    box-shadow:
    0 8px 18px rgba(255,122,0,0.18);

}

.export-btn:hover{

    transform:translateY(-2px);

}
</style>