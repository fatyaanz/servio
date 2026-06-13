<div class="detail-header">

    <a href="{{ route('aktifitas') }}"
       class="back-btn">

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

        <span class="header-badge">
            📋 Aktivitas Servio
        </span>

        <h1>
            Detail Aktivitas <span style="color: #F08A28;">#{{ $booking->formatted_id }}</span>
        </h1>

        <p>
            Lihat informasi lengkap terkait layanan yang Anda pesan.
        </p>

    </div>

    <div class="header-icon">

        🛠️

    </div>

</div>

<style>

/* =========================
   HEADER
========================= */

.detail-header{

    max-width:1200px;

    margin:20px auto 25px;

    padding:25px;

    display:flex;
    align-items:center;

    gap:18px;

    border-radius:28px;

    background:
        linear-gradient(
            135deg,
            #FFF8F1,
            #FFFFFF
        );

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);
}

/* =========================
   BACK BUTTON
========================= */

.back-btn{

    width:52px;
    height:52px;

    flex-shrink:0;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:16px;

    text-decoration:none;

    color:#333;

    background:white;

    border:1px solid #F2F2F2;

    box-shadow:
        0 6px 15px rgba(0,0,0,.05);

    transition:.3s ease;
}

.back-btn:hover{

    background:#F08A28;

    color:white;

    transform:translateY(-2px);
}

/* =========================
   CONTENT
========================= */

.header-content{

    flex:1;
}

.header-badge{

    display:inline-flex;

    padding:8px 14px;

    border-radius:999px;

    background:#FFF2E4;

    color:#F08A28;

    border:1px solid #FFE0BE;

    font-size:12px;
    font-weight:700;
}

.header-content h1{

    margin:12px 0 6px;

    color:#222;

    font-size:34px;
    font-weight:800;

    line-height:1.2;
}

.header-content p{

    margin:0;

    color:#777;

    font-size:14px;

    line-height:1.7;
}

/* =========================
   RIGHT ICON
========================= */

.header-icon{

    width:70px;
    height:70px;

    flex-shrink:0;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:20px;

    font-size:32px;

    background:
        linear-gradient(
            135deg,
            #F08A28,
            #FFB04D
        );

    color:white;

    box-shadow:
        0 10px 25px rgba(240,138,40,.25);
}

/* =========================
   TABLET
========================= */

@media(max-width:768px){

    .detail-header{

        margin:15px;

        padding:20px;

        gap:14px;
    }

    .back-btn{

        width:45px;
        height:45px;
    }

    .header-content h1{

        font-size:24px;
    }

    .header-content p{

        font-size:13px;
    }

    .header-icon{

        width:55px;
        height:55px;

        font-size:24px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .header-icon{

        display:none;
    }

}

</style>