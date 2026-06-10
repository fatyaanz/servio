<div class="frequently-section">

    <div class="section-header">
        <h2>Layanan Sering Dicari</h2>
    </div>

    <div class="service-tags">

        <a href="#" class="service-tag">
            TV
        </a>

        <a href="#" class="service-tag">
            AC
        </a>

        <a href="#" class="service-tag">
            Cleaning Service
        </a>

        <a href="#" class="service-tag">
            Pasang AC
        </a>

    </div>

</div>

<style>

/* =========================
   SECTION
========================= */

.frequently-section{
    max-width:1400px;

    margin:30px auto 20px;

    padding:0 30px;
}

/* =========================
   HEADER
========================= */

.frequently-section .section-header{
    margin-bottom:20px;
}

.frequently-section .section-header h2{
    margin:0;

    font-size:28px;
    font-weight:800;

    color:#222;
}

/* =========================
   TAGS CONTAINER
========================= */

.service-tags{
    display:flex;
    flex-wrap:wrap;

    gap:15px;
}

/* =========================
   TAG
========================= */

.service-tag{
    text-decoration:none;

    display:flex;
    align-items:center;
    justify-content:center;

    padding:14px 24px;

    border-radius:999px;

    background:rgba(255,255,255,0.8);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:1px solid rgba(240,138,40,0.15);

    color:#F08A28;

    font-size:15px;
    font-weight:700;

    transition:all .3s ease;

    box-shadow:
        0 6px 15px rgba(0,0,0,0.04);
}

.service-tag:hover{
    background:linear-gradient(
        135deg,
        #F08A28,
        #FFAA4C
    );

    color:white;

    transform:
        translateY(-4px)
        scale(1.03);

    box-shadow:
        0 12px 25px rgba(240,138,40,0.25);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .frequently-section{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .frequently-section{
        padding:0 15px;
        margin-bottom:80px;
    }

    .frequently-section .section-header h2{
        font-size:22px;
    }

    .service-tags{
        gap:10px;
    }

    .service-tag{
        padding:12px 18px;
        font-size:14px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .service-tag{
        padding:10px 16px;
        font-size:13px;
    }

    .frequently-section .section-header h2{
        font-size:20px;
    }

}

</style>