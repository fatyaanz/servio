<div class="activity-header">

    <div class="header-content">

        <div class="header-badge">
            <i class='bx bx-clipboard' style="font-size:16px;"></i>
            Aktivitas Servio
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
            <i class='bx bx-wrench' style="font-size:40px;"></i>
        </div>

    </div>

</div>

<style>

/* =========================
   ACTIVITY HEADER
========================= */

.activity-header{

    max-width:1200px;

    margin:16px auto 24px;

    padding:32px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:24px;

    border-radius:20px;

    background:
        linear-gradient(
            135deg,
            var(--primary-light),
            #FFFFFF
        );

    border:1px solid var(--border);

    box-shadow:var(--shadow-sm);

    overflow:hidden;

    position:relative;
}

/* =========================
   BACKGROUND EFFECT
========================= */

.activity-header::before{

    content:"";

    position:absolute;

    top:-60px;
    right:-60px;

    width:180px;
    height:180px;

    border-radius:50%;

    background:
        rgba(226,135,67,.06);

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

    gap:6px;

    padding:6px 14px;

    border-radius:999px;

    background:var(--primary-light);

    color:var(--primary);

    border:1px solid rgba(226,135,67,.15);

    font-size:12px;
    font-weight:600;

    margin-bottom:14px;
}

/* =========================
   TITLE
========================= */

.activity-header h1{

    margin:0;

    color:#000;

    font-size:24px;
    font-weight:700;

    line-height:1.3;
}

.activity-header p{

    margin-top:8px;

    color:#626B7A;

    font-size:14px;

    line-height:1.6;

    max-width:500px;
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

    width:80px;
    height:80px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:
        linear-gradient(
            135deg,
            var(--primary),
            #D47735
        );

    color:white;

    box-shadow:
        0 8px 24px var(--primary-glow);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .activity-header{

        flex-direction:column;

        align-items:flex-start;

        margin:12px;

        padding:24px;
    }

    .activity-header h1{

        font-size:20px;
    }

    .header-illustration{

        align-self:center;
    }

    .illustration-circle{

        width:64px;
        height:64px;
    }

    .illustration-circle i{
        font-size:28px !important;
    }

}

</style>