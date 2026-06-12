<div class="provider-statistics">

    <div class="stat-card">

        <div class="stat-icon">
            💼
        </div>

        <h4>250+</h4>

        <p>Pekerjaan Selesai</p>

    </div>

    <div class="stat-card">

        <div class="stat-icon">
            ⭐
        </div>

        <h4>4.9/5</h4>

        <p>Rating Rata-rata</p>

    </div>

    <div class="stat-card">

        <div class="stat-icon">
            😊
        </div>

        <h4>98%</h4>

        <p>Pelanggan Puas</p>

    </div>

    <div class="stat-card">

        <div class="stat-icon">
            🕒
        </div>

        <h4>5+ Tahun</h4>

        <p>Pengalaman</p>

    </div>

</div>

<style>

/* =========================
   PROVIDER STATISTICS
========================= */

.provider-statistics{
    max-width:1400px;

    margin:30px auto;

    padding:0 30px;

    display:grid;
    grid-template-columns:repeat(4,1fr);

    gap:18px;
}

/* =========================
   CARD
========================= */

.stat-card{

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border-radius:22px;

    padding:24px 20px;

    text-align:center;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);

    transition:.3s ease;
}

.stat-card:hover{

    transform:translateY(-4px);

    box-shadow:
        0 15px 30px rgba(240,138,40,.10);
}

/* =========================
   ICON
========================= */

.stat-icon{

    width:55px;
    height:55px;

    margin:0 auto 14px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:16px;

    background:rgba(240,138,40,.10);

    font-size:26px;
}

/* =========================
   NUMBER
========================= */

.stat-card h4{

    margin:0;

    font-size:26px;
    font-weight:800;

    color:#222;
}

/* =========================
   LABEL
========================= */

.stat-card p{

    margin-top:8px;

    color:#777;

    font-size:13px;
    font-weight:500;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .provider-statistics{
        grid-template-columns:repeat(2,1fr);

        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .provider-statistics{

        grid-template-columns:repeat(2,1fr);

        gap:12px;

        padding:0 15px;
    }

    .stat-card{

        padding:18px 14px;
    }

    .stat-icon{

        width:45px;
        height:45px;

        font-size:22px;
    }

    .stat-card h4{

        font-size:20px;
    }

    .stat-card p{

        font-size:12px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .provider-statistics{
        grid-template-columns:1fr 1fr;
    }

    .stat-card h4{
        font-size:18px;
    }

    .stat-icon{
        width:40px;
        height:40px;
        font-size:20px;
    }

}

</style>