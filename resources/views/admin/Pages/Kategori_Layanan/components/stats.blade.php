<div class="stats-grid">

    <!-- TOTAL KATEGORI -->

    <div class="stats-card">

        <div class="stats-icon orange">
            📂
        </div>

        <div class="stats-content">

            <span class="stats-label">
                Total Kategori
            </span>

            <h1>{{ $totalCategories }}</h1>

            <p>
                Semua kategori layanan
            </p>

        </div>

    </div>

    <!-- KATEGORI AKTIF -->

    <div class="stats-card">

        <div class="stats-icon green">
            ✔
        </div>

        <div class="stats-content">

            <span class="stats-label">
                Kategori Aktif
            </span>

            <h1>{{ $activeCategories }}</h1>

            <p>
                Kategori aktif saat ini
            </p>

        </div>

    </div>

    <!-- TOTAL PROVIDER -->

    <div class="stats-card">

        <div class="stats-icon blue">
            👨‍🔧
        </div>

        <div class="stats-content">

            <span class="stats-label">
                Total Penyedia
            </span>

            <h1>{{ $totalProviders }}</h1>

            <p>
                Provider terdaftar
            </p>

        </div>

    </div>

</div>

<style>

/* =========================
   STATS GRID
========================= */



.stats-grid{

    display:grid;

    grid-template-columns:
    repeat(3, 1fr);

    gap:18px;

    margin-bottom:28px;

}

/* =========================
   CARD
========================= */

.stats-card{

    background:#ffffff;

    border:1px solid #edf2f7;

    border-radius:22px;

    padding:20px;

    display:flex;

    align-items:center;

    gap:16px;

    box-shadow:
    0 4px 18px rgba(15,23,42,0.05);

    transition:.25s ease;

}

.stats-card:hover{

    transform:translateY(-3px);

    box-shadow:
    0 10px 24px rgba(15,23,42,0.08);

}

/* =========================
   ICON
========================= */

.stats-icon{

    width:64px;
    height:64px;

    border-radius:18px;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:28px;

    flex-shrink:0;

}

/* COLORS */

.orange{

    background:#fff4e8;

    color:#ff7a00;

}

.green{

    background:#ecfdf3;

    color:#16a34a;

}

.blue{

    background:#eff6ff;

    color:#2563eb;

}

.pink{

    background:#fff1f2;

    color:#e11d48;

}

/* =========================
   CONTENT
========================= */

.stats-content{

    display:flex;

    flex-direction:column;

}

.stats-label{

    font-size:13px;

    font-weight:600;

    color:#6b7280;

    margin-bottom:6px;

}

.stats-content h1{

    font-size:30px;

    font-weight:800;

    color:#111827;

    line-height:1.1;

    margin:0 0 6px;

}

.stats-content p{

    font-size:12px;

    color:#9ca3af;

    line-height:1.5;

    margin:0;

}

/* =========================
   RESPONSIVE
========================= */

/* =========================
   RESPONSIVE
========================= */

@media(max-width:1100px){

    .stats-grid{

        grid-template-columns:
        repeat(2,1fr);

    }

}

@media(max-width:768px){

    .stats-grid{

        grid-template-columns:1fr;

    }

}


</style>