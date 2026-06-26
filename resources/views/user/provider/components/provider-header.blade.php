<div class="provider-header">

    <a href="{{ route('layanan') }}" class="back-btn">

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

    <div class="provider-header-content">

        <h1>Detail Layanan</h1>

        <span class="provider-subtitle">
            Informasi lengkap penyedia layanan
        </span>

    </div>

</div>

<style>

/* =========================
   PROVIDER HEADER
========================= */

.provider-header{

    max-width:1400px;

    margin:20px auto 25px;

    padding:0 30px;

    display:flex;
    align-items:center;

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

.provider-header-content{

    display:flex;
    flex-direction:column;
}

.provider-header-content h1{

    margin:0;

    font-size:30px;
    font-weight:800;

    color:#222;

    line-height:1.2;
}

.provider-subtitle{

    margin-top:6px;

    width:fit-content;

    padding:7px 12px;

    border-radius:999px;

    background:rgba(240,138,40,.10);

    color:#F08A28;

    font-size:12px;
    font-weight:700;

    border:1px solid rgba(240,138,40,.15);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .provider-header{
        padding:0 20px;
    }

    .provider-header-content h1{
        font-size:26px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .provider-header{

        padding:0 15px;

        gap:12px;
    }

    .back-btn{

        width:42px;
        height:42px;
    }

    .provider-header-content h1{
        font-size:22px;
    }

    .provider-subtitle{
        font-size:11px;
        padding:6px 10px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .provider-header-content h1{
        font-size:20px;
    }

}

</style>