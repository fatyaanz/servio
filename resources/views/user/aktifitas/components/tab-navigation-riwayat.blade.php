<div class="activity-tabs">

    <a href="{{ route('aktifitas') }}"
       class="tab-btn">

        <span>Aktif</span>

        <span class="tab-badge">
            3
        </span>

    </a>

    <a href="{{ route('riwayat') }}"
       class="tab-btn active">

        <span>Riwayat</span>
        

    </a>

</div>

<style>

/* =========================
   ACTIVITY TABS
========================= */

.activity-tabs{

    max-width:500px;

    margin:20px auto 30px;

    padding:6px;

    display:flex;

    gap:8px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border-radius:20px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 8px 20px rgba(0,0,0,.05);
}

/* =========================
   TAB BUTTON
========================= */

.tab-btn{

    flex:1;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:8px;

    padding:14px 20px;

    text-decoration:none;

    color:#777;

    font-size:15px;
    font-weight:600;

    border-radius:16px;

    transition:.3s ease;
}

/* =========================
   ACTIVE TAB
========================= */

.tab-btn.active{

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    box-shadow:
        0 8px 20px rgba(240,138,40,.25);
}

/* =========================
   HOVER
========================= */

.tab-btn:not(.active):hover{

    background:#FFF7EF;

    color:#F08A28;
}

/* =========================
   BADGE
========================= */

.tab-badge{

    min-width:22px;
    height:22px;

    display:flex;
    align-items:center;
    justify-content:center;

    padding:0 6px;

    border-radius:999px;

    background:rgba(255,255,255,.25);

    font-size:11px;
    font-weight:700;
}

.tab-btn:not(.active) .tab-badge{

    background:#F3F4F6;

    color:#666;
}

/* =========================
   TABLET
========================= */

@media(max-width:768px){

    .activity-tabs{

        margin:15px;

        max-width:none;
    }

    .tab-btn{

        padding:12px;

        font-size:14px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .tab-btn{

        font-size:13px;
    }

    .tab-badge{

        min-width:20px;
        height:20px;

        font-size:10px;
    }

}

</style>