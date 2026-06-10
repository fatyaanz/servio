<div class="history-filter">

    <button class="history-chip active">

        <span>📋</span>
        Semua

    </button>

    <button class="history-chip">

        <span>✅</span>
        Selesai

    </button>

    <button class="history-chip">

        <span>❌</span>
        Dibatalkan

    </button>

</div>

<style>

/* =========================
   HISTORY FILTER
========================= */

.history-filter{

    max-width:1200px;

    margin:0 auto 25px;

    padding:0 20px;

    display:flex;

    gap:12px;

    overflow-x:auto;

    scrollbar-width:none;
}

.history-filter::-webkit-scrollbar{

    display:none;
}

/* =========================
   CHIP
========================= */

.history-chip{

    border:none;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:8px;

    padding:12px 18px;

    border-radius:999px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(240,138,40,.08);

    color:#666;

    font-size:14px;
    font-weight:600;

    white-space:nowrap;

    cursor:pointer;

    transition:.3s ease;

    box-shadow:
        0 5px 15px rgba(0,0,0,.04);
}

.history-chip span{

    font-size:14px;
}

/* =========================
   ACTIVE
========================= */

.history-chip.active{

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    box-shadow:
        0 10px 20px rgba(240,138,40,.25);
}

/* =========================
   HOVER
========================= */

.history-chip:not(.active):hover{

    background:#FFF7EF;

    color:#F08A28;

    transform:translateY(-2px);
}

/* =========================
   TABLET
========================= */

@media(max-width:768px){

    .history-filter{

        padding:0 15px;
    }

    .history-chip{

        padding:10px 16px;

        font-size:13px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .history-chip{

        font-size:12px;

        padding:9px 14px;
    }

}

</style>