<div class="stats-grid">

    <!-- TOTAL KATEGORI -->

    <div class="stat-card">

        <div class="stat-icon">

            <i class='bx bx-category'></i>

        </div>

        <div class="stat-content">

            <span class="stat-title">
                Total Kategori
            </span>

            <h2>
                {{ $totalCategories }}
            </h2>

            <small>
                Semua kategori layanan
            </small>

        </div>

    </div>

    <!-- KATEGORI AKTIF -->

    <div class="stat-card">

        <div class="stat-icon">

            <i class='bx bx-check-circle'></i>

        </div>

        <div class="stat-content">

            <span class="stat-title">
                Kategori Aktif
            </span>

            <h2>
                {{ $activeCategories }}
            </h2>

            <small>
                Kategori aktif saat ini
            </small>

        </div>

    </div>

    <!-- TOTAL PROVIDER -->

    <div class="stat-card">

        <div class="stat-icon">

            <i class='bx bx-group'></i>

        </div>

        <div class="stat-content">

            <span class="stat-title">
                Total Penyedia
            </span>

            <h2>
                {{ $totalProviders }}
            </h2>

            <small>
                Provider terdaftar
            </small>

        </div>

    </div>

</div>

<style>

/* =========================
    STATS GRID
========================= */

.stats-grid{

    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:20px;

    margin:24px 0;

}

/* =========================
    CARD
========================= */

.stat-card{

    display:flex;

    align-items:center;

    gap:16px;

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:20px;

    box-shadow:var(--shadow-sm);

    transition:.3s;

}

.stat-card:hover{

    transform:translateY(-3px);

}

/* =========================
    ICON
========================= */

.stat-icon{

    width:56px;
    height:56px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:16px;

    background:#FFF4E6;

    color:var(--primary);

    font-size:24px;

    flex-shrink:0;

}

/* =========================
    CONTENT
========================= */

.stat-content{
    flex:1;
}

.stat-title{

    display:block;

    font-size:13px;

    color:var(--text-secondary);

    margin-bottom:4px;

}

.stat-content h2{

    font-size:28px;

    font-weight:700;

    color:var(--text-dark);

    margin:0;

}

.stat-content small{

    display:block;

    margin-top:4px;

    color:var(--text-secondary);

    font-size:12px;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:992px){

    .stats-grid{
        grid-template-columns:1fr;
    }

}

</style>