<div class="activity-tabs">

    <a href="{{ route('aktifitas') }}"
       class="tab-btn active">

        <span>Aktif</span>

       <span class="tab-count">
    {{ $bookings->count() }}
</span>

    </a>

    <a href="{{ route('riwayat') }}"
       class="tab-btn">

        <span>Riwayat</span>
        

    </a>

</div>

<style>

/* =========================
   ACTIVITY TABS
========================= */

.activity-tabs{

    max-width:500px;

    margin:20px auto 25px;

    padding:8px;

    display:flex;

    gap:10px;

    background:#FFFFFF;

    border-radius:22px;

    border:1px solid #F3E8DB;

    box-shadow:
        0 8px 24px rgba(0,0,0,.04);
}

/* =========================
   TAB BUTTON
========================= */

.tab-btn{

    flex:1;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:10px;

    padding:16px;

    border-radius:16px;

    text-decoration:none;

    font-size:15px;
    font-weight:700;

    color:#777;

    transition:.3s ease;
}

/* =========================
   ACTIVE
========================= */

.tab-btn.active{

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB347
    );

    color:white;

    box-shadow:
        0 8px 20px rgba(240,138,40,.18);
}

/* =========================
   COUNT BADGE
========================= */

.tab-count{

    min-width:24px;
    height:24px;

    padding:0 8px;

    border-radius:999px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:11px;
    font-weight:800;

    background:rgba(255,255,255,.25);

    color:white;
}

.tab-btn:not(.active):hover{

    background:#FFF7EF;

    color:#F08A28;
}
/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .activity-tabs{

        margin:20px 20px 25px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .activity-tabs{

        margin:15px;

        padding:5px;
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

    .tab-count{

        min-width:20px;
        height:20px;

        font-size:10px;
    }

}

</style>