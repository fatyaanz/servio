<div class="layanan-header">

    <a href="{{ url()->previous() }}" class="back-button">
        <svg width="20"
             height="20"
             viewBox="0 0 24 24"
             fill="none">

            <path d="M15 18L9 12L15 6"
                  stroke="currentColor"
                  stroke-width="2.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>

        </svg>
    </a>

    <div class="header-content">

        <h1>
            Penyedia Layanan
        </h1>

        <div class="provider-count">
            Penyedia terpercaya di sekitar Anda
        </div>

    </div>

</div>

<style>

/* =========================
   HEADER
========================= */

.layanan-header{
    max-width:1400px;

    margin:20px auto;

    padding:0 30px;

    display:flex;
    align-items:center;

    gap:16px;
}

/* =========================
   BACK BUTTON
========================= */

.back-button{
    width:48px;
    height:48px;

    flex-shrink:0;

    display:flex;
    justify-content:center;
    align-items:center;

    text-decoration:none;

    color:#333;

    border-radius:16px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,.5);

    box-shadow:
        0 8px 20px rgba(0,0,0,.06);

    transition:.3s ease;
}

.back-button:hover{
    background:#F08A28;

    color:white;

    transform:
        translateY(-2px)
        scale(1.03);

    box-shadow:
        0 12px 25px rgba(240,138,40,.25);
}

/* =========================
   HEADER CONTENT
========================= */

.header-content{
    display:flex;
    flex-direction:column;
}

.header-content h1{
    margin:0;

    font-size:30px;
    font-weight:800;

    color:#222;

    line-height:1.2;
}

.provider-count{
    width:fit-content;

    margin-top:8px;

    padding:8px 14px;

    border-radius:999px;

    background:rgba(240,138,40,.10);

    color:#F08A28;

    font-size:13px;
    font-weight:700;

    border:1px solid rgba(240,138,40,.15);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .layanan-header{
        padding:0 20px;
    }

    .header-content h1{
        font-size:26px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .layanan-header{
        padding:0 15px;

        gap:12px;
    }

    .back-button{
        width:42px;
        height:42px;
    }

    .header-content h1{
        font-size:22px;
    }

    .provider-count{
        font-size:12px;
        padding:6px 12px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .header-content h1{
        font-size:20px;
    }

    .provider-count{
        font-size:11px;
    }

}

</style>