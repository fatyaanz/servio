<div class="filter-section">

    <div class="filters">

         <div class="search-box">

        <i class='bx bx-search'></i>

        <input
            type="text"
            placeholder="Cari penyedia layanan..."
        >

    </div>

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

        <button class="btn btn-primary export-btn">
        <i class='bx bx-export'></i>
        Export
    </button>

    </div>

    <!-- EXPORT -->

    

    </div>

<style>
    .filter-select{

    height:44px;

    padding:0 14px;

    border:1px solid var(--border);

    border-radius:12px;

    background:white;

    font-size:14px;

    color:var(--text-dark);

    transition:.3s;
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

    border-color:var(--primary);

    background:white;

}

.export-btn{
    min-width:120px;
}

.export-btn:hover{

    transform:translateY(-2px);

}

.search-box{

    display:flex;
    align-items:center;
    gap:10px;

    height:44px;

    padding:0 14px;

    background:white;

    border:1px solid var(--border);

    border-radius:12px;

    min-width:280px;
}

.search-box input{

    border:none;

    outline:none;

    width:100%;

    background:transparent;
}
</style>