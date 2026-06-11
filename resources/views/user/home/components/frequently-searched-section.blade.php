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
   FREQUENTLY SEARCHED
========================= */

.frequently-section{

    margin-bottom:28px;

}

/* =========================
   HEADER
========================= */

.frequently-section .section-header{

    margin-bottom:16px;

}

.frequently-section .section-header h2{

    margin:0;

    font-size:20px;

    font-weight:700;

    color:var(--text-dark);

}

/* =========================
   TAGS
========================= */

.service-tags{

    display:flex;

    flex-wrap:wrap;

    gap:10px;

}

/* =========================
   TAG
========================= */

.service-tag{

    text-decoration:none;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    padding:10px 16px;

    border-radius:999px;

    background:white;

    border:1px solid var(--border);

    color:var(--text-dark);

    font-size:13px;

    font-weight:500;

    transition:.3s;

    box-shadow:var(--shadow-sm);

}

.service-tag:hover{

    background:var(--primary);

    border-color:var(--primary);

    color:white;

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .service-tags{

        gap:8px;

    }

    .service-tag{

        font-size:12px;

        padding:8px 14px;

    }

}
</style>