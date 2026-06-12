<div class="produk-stats">

    <!-- CARD -->

    <div class="produk-stat-card total">

        <div class="stat-icon">
            📦
        </div>

        <div class="stat-info">

            <p>
                Total Produk
            </p>

            <h2>
                {{ $produks->count() }}
            </h2>

            <span>
                Semua produk tersedia
            </span>

        </div>

    </div>

    <!-- CARD -->

    <div class="produk-stat-card warning">

        <div class="stat-icon">
            ⚠️
        </div>

        <div class="stat-info">

            <p>
                Stok Menipis
            </p>

            <h2>
                {{ \App\Models\Produk::where('stok','<=',10)->count() }}
            </h2>

            <span>
                Perlu segera restock
            </span>

        </div>

    </div>

    <!-- CARD -->

    <div class="produk-stat-card category">

        <div class="stat-icon">
            🧩
        </div>

        <div class="stat-info">

            <p>
                Kategori
            </p>

            <h2>
                12
            </h2>

            <span>
                Jenis produk tersedia
            </span>

        </div>

    </div>

</div>

<style>

/* =========================
    STATS WRAPPER
========================== */

.produk-stats{

    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:16px;

}

/* =========================
    CARD
========================== */

.produk-stat-card{

    display:flex;
    align-items:center;
    gap:14px;

    padding:18px;

    border-radius:20px;

    background:
    rgba(255,255,255,0.85);

    backdrop-filter:blur(16px);
    -webkit-backdrop-filter:blur(16px);

    border:
    1px solid rgba(255,255,255,0.4);

    box-shadow:
    0 4px 14px rgba(15,23,42,0.04);

    transition:0.3s ease;

}

.produk-stat-card:hover{

    transform:
    translateY(-2px);

}

/* =========================
    ICON
========================== */

.stat-icon{

    width:58px;
    height:58px;

    border-radius:18px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:26px;

    flex-shrink:0;

}

/* TOTAL */

.total .stat-icon{

    background:
    linear-gradient(
        135deg,
        #f3e8ff,
        #e9d5ff
    );

}

/* WARNING */

.warning .stat-icon{

    background:
    linear-gradient(
        135deg,
        #ffe4e6,
        #fecdd3
    );

}

/* CATEGORY */

.category .stat-icon{

    background:
    linear-gradient(
        135deg,
        #dbeafe,
        #bfdbfe
    );

}

/* =========================
    INFO
========================== */

.stat-info p{

    font-size:12px;
    color:#6b7280;

    margin-bottom:1px;

    font-weight:500;

}

.stat-info h2{

    font-size:28px;
    color:#111827;

    margin-bottom:2px;

    font-weight:800;

    line-height:1;

}

.stat-info span{

    font-size:11px;
    color:#9ca3af;

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:992px){

    .produk-stats{

        grid-template-columns:1fr;

    }

}

</style>