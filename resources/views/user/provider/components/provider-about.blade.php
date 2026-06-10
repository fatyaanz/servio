<div class="provider-about">

    <div class="about-card">

        <div class="about-header">

            <div class="about-icon">
                📋
            </div>

            <h3>Tentang Penyedia</h3>

        </div>

        <p>
            Berkah AC Service telah berpengalaman lebih dari 5 tahun
            dalam menangani berbagai permasalahan AC rumah maupun
            kantor. Kami mengutamakan kualitas pekerjaan,
            ketepatan waktu, serta kepuasan pelanggan dengan
            memberikan layanan profesional dan bergaransi.
        </p>

    </div>

</div>

<style>

/* =========================
   ABOUT PROVIDER
========================= */

.provider-about{
    max-width:1400px;

    margin:30px auto;

    padding:0 30px;
}

/* =========================
   CARD
========================= */

.about-card{

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border-radius:24px;

    padding:24px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);
}

/* =========================
   HEADER
========================= */

.about-header{

    display:flex;
    align-items:center;

    gap:12px;

    margin-bottom:16px;
}

.about-icon{

    width:42px;
    height:42px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:12px;

    background:rgba(240,138,40,.10);

    font-size:20px;
}

.about-header h3{

    margin:0;

    font-size:22px;
    font-weight:800;

    color:#222;
}

/* =========================
   CONTENT
========================= */

.about-card p{

    margin:0;

    color:#666;

    font-size:15px;

    line-height:1.9;

    text-align:justify;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .provider-about{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .provider-about{
        padding:0 15px;
    }

    .about-card{
        padding:18px;
    }

    .about-header h3{
        font-size:18px;
    }

    .about-card p{
        font-size:14px;
        line-height:1.8;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .about-header{
        gap:10px;
    }

    .about-icon{
        width:36px;
        height:36px;
        font-size:18px;
    }

    .about-header h3{
        font-size:17px;
    }

    .about-card p{
        font-size:13px;
    }

}

</style>