<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div class="statistics-section">

    <div class="section-title">

        <h3>Statistik Penyedia</h3>

        <p>
            Ringkasan performa dan pengalaman layanan
        </p>

    </div>

    <div class="provider-statistics">

        <div class="stat-card">

            <div class="stat-icon orange">

                <i class='bx bx-briefcase'></i>

            </div>

            <h4>250+</h4>

            <p>Pekerjaan Selesai</p>

        </div>

        <div class="stat-card">

            <div class="stat-icon yellow">

                <i class='bx bxs-star'></i>

            </div>

            <h4>4.9/5</h4>

            <p>Rating Rata-rata</p>

        </div>

        <div class="stat-card">

            <div class="stat-icon green">

                <i class='bx bx-happy-heart-eyes'></i>

            </div>

            <h4>98%</h4>

            <p>Pelanggan Puas</p>

        </div>

        <div class="stat-card">

            <div class="stat-icon blue">

                <i class='bx bx-time-five'></i>

            </div>

            <h4>5+ Tahun</h4>

            <p>Pengalaman</p>

        </div>

    </div>

</div>

<style>

/* =========================
   SECTION
========================= */

.statistics-section{

    max-width:1400px;

    margin:30px auto;

    padding:0 30px;

}

/* =========================
   TITLE
========================= */

.section-title{

    margin-bottom:20px;

}

.section-title h3{

    margin:0;

    font-size:24px;

    font-weight:800;

    color:#111827;

}

.section-title p{

    margin-top:6px;

    color:#64748B;

    font-size:14px;

}

/* =========================
   GRID
========================= */

.provider-statistics{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:18px;

}

/* =========================
   CARD
========================= */

.stat-card{

    background:white;

    border-radius:24px;

    padding:24px;

    border:1px solid #eef2f7;

    box-shadow:
    0 8px 24px rgba(15,23,42,.05);

    transition:.3s ease;

}

.stat-card:hover{

    transform:translateY(-4px);

    box-shadow:
    0 16px 30px rgba(15,23,42,.08);

}

/* =========================
   ICON
========================= */

.stat-icon{

    width:60px;
    height:60px;

    border-radius:18px;

    display:flex;

    align-items:center;
    justify-content:center;

    margin-bottom:18px;

}

.stat-icon i{

    font-size:28px;

}

/* COLORS */

.orange{

    background:#FFF4E8;

    color:#FF8A00;

}

.yellow{

    background:#FFF9E8;

    color:#EAB308;

}

.green{

    background:#ECFDF3;

    color:#16A34A;

}

.blue{

    background:#EFF6FF;

    color:#2563EB;

}

/* =========================
   TEXT
========================= */

.stat-card h4{

    margin:0;

    font-size:30px;

    font-weight:800;

    color:#111827;

}

.stat-card p{

    margin-top:8px;

    font-size:14px;

    color:#64748B;

}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .statistics-section{

        padding:0 20px;

    }

    .provider-statistics{

        grid-template-columns:
        repeat(2,1fr);

    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .statistics-section{

        padding:0 15px;

    }

    .provider-statistics{

        grid-template-columns:1fr;

        gap:14px;

    }

    .stat-card{

        padding:20px;

    }

    .stat-card h4{

        font-size:24px;

    }

}

</style>