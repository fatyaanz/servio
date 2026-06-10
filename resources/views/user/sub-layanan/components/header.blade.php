<div class="service-header">

    <a
    href="{{ route('provider.detail', $provider->id) }}"
    class="back-btn"
>

        <svg width="20"
             height="20"
             viewBox="0 0 24 24"
             fill="none">

            <path
                d="M15 18L9 12L15 6"
                stroke="currentColor"
                stroke-width="2.5"
                stroke-linecap="round"
                stroke-linejoin="round"/>

        </svg>

    </a>

    <div class="header-content">

        <div class="header-badge">
            Langkah 1 dari 4
        </div>

        <h1>
            Apa yang ingin kamu perbaiki?
        </h1>

        <p>
            Kamu bisa memilih lebih dari satu layanan sesuai kebutuhan
        </p>

    </div>

</div>

<style>

/* =========================
   SERVICE HEADER
========================= */

.service-header{

    max-width:1400px;

    margin:20px auto 25px;

    padding:0 30px;

    display:flex;
    align-items:flex-start;

    gap:16px;
}

/* =========================
   BACK BUTTON
========================= */

.back-btn{

    width:48px;
    height:48px;

    flex-shrink:0;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    color:#333;

    border-radius:16px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,.4);

    box-shadow:
        0 8px 20px rgba(0,0,0,.06);

    transition:.3s ease;
}

.back-btn:hover{

    background:#F08A28;

    color:white;

    transform:
        translateY(-2px)
        scale(1.03);

    box-shadow:
        0 12px 25px rgba(240,138,40,.25);
}

/* =========================
   CONTENT
========================= */

.header-content{
    flex:1;
}

/* =========================
   BADGE
========================= */

.header-badge{

    width:fit-content;

    padding:8px 14px;

    border-radius:999px;

    background:rgba(240,138,40,.10);

    color:#F08A28;

    font-size:12px;
    font-weight:700;

    border:1px solid rgba(240,138,40,.15);

    margin-bottom:12px;
}

/* =========================
   TITLE
========================= */

.header-content h1{

    margin:0;

    color:#222;

    font-size:34px;
    font-weight:800;

    line-height:1.25;
}

.header-content p{

    margin-top:10px;

    color:#777;

    font-size:15px;

    line-height:1.7;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .service-header{
        padding:0 20px;
    }

    .header-content h1{
        font-size:30px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .service-header{

        padding:0 15px;

        gap:12px;
    }

    .back-btn{

        width:42px;
        height:42px;
    }

    .header-content h1{

        font-size:24px;
    }

    .header-content p{

        font-size:14px;
    }

    .header-badge{

        font-size:11px;

        padding:6px 12px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .header-content h1{

        font-size:22px;
    }

    .header-content p{

        font-size:13px;
    }

}

</style>