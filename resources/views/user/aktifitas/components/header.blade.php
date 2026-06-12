<div class="activity-header">

    <div class="header-content">

        <div class="header-badge">
            📋 Aktivitas Servio
        </div>

        <h1>
            Aktivitas
        </h1>

        <p>
            Pantau status layanan yang sedang berjalan,
            proses booking, dan riwayat pemesanan Anda.
        </p>

    </div>

    <div class="header-illustration">

        <div class="illustration-circle">
            🛠️
        </div>

    </div>

</div>

<style>

/* =========================
   ACTIVITY HEADER
========================= */

.activity-header{

    max-width:1400px;

    margin:20px auto 30px;

    padding:40px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:30px;

    border-radius:30px;

    background:
        linear-gradient(
            135deg,
            #FFF8F1,
            #FFFFFF
        );

    border:1px solid rgba(240,138,40,.10);

    box-shadow:
        0 15px 40px rgba(0,0,0,.05);

    overflow:hidden;

    position:relative;
}

/* =========================
   BACKGROUND EFFECT
========================= */

.activity-header::before{

    content:"";

    position:absolute;

    top:-80px;
    right:-80px;

    width:220px;
    height:220px;

    border-radius:50%;

    background:
        rgba(240,138,40,.08);

    z-index:0;
}

.activity-header::after{

    content:"";

    position:absolute;

    bottom:-60px;
    left:-60px;

    width:160px;
    height:160px;

    border-radius:50%;

    background:
        rgba(240,138,40,.04);

    z-index:0;
}

/* =========================
   CONTENT
========================= */

.header-content{

    flex:1;

    position:relative;
    z-index:2;
}

/* =========================
   BADGE
========================= */

.header-badge{

    display:inline-flex;
    align-items:center;

    gap:8px;

    padding:9px 16px;

    border-radius:999px;

    background:#FFF2E4;

    color:#F08A28;

    border:1px solid #FFE0BE;

    font-size:13px;
    font-weight:700;

    margin-bottom:18px;
}

/* =========================
   TITLE
========================= */

.activity-header h1{

    margin:0;

    color:#222;

    font-size:48px;
    font-weight:800;

    line-height:1.1;
}

.activity-header p{

    margin-top:14px;

    color:#777;

    font-size:16px;

    line-height:1.8;

    max-width:650px;
}

/* =========================
   RIGHT ICON
========================= */

.header-illustration{

    position:relative;
    z-index:2;

    flex-shrink:0;
}

.illustration-circle{

    width:120px;
    height:120px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:52px;

    background:
        linear-gradient(
            135deg,
            #F08A28,
            #FFB04D
        );

    color:white;

    box-shadow:
        0 15px 35px rgba(240,138,40,.25);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .activity-header{

        margin:20px;

        padding:30px;
    }

    .activity-header h1{

        font-size:38px;
    }

    .illustration-circle{

        width:100px;
        height:100px;

        font-size:44px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .activity-header{

        flex-direction:column;

        align-items:flex-start;

        margin:15px;

        padding:24px;
    }

    .activity-header h1{

        font-size:30px;
    }

    .activity-header p{

        font-size:14px;
    }

    .header-illustration{

        align-self:center;
    }

    .illustration-circle{

        width:80px;
        height:80px;

        font-size:36px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .activity-header h1{

        font-size:26px;
    }

}

</style>