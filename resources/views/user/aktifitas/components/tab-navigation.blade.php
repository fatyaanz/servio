<div class="activity-tabs">

    <button type="button"
            id="tab-btn-aktif"
            class="tab-btn {{ $activeTab === 'aktif' ? 'active' : '' }}"
            onclick="switchTab('aktif')">

        <span>Aktif</span>

        <span class="tab-count">
            {{ $activeBookings->count() }}
        </span>

    </button>

    <button type="button"
            id="tab-btn-riwayat"
            class="tab-btn {{ $activeTab === 'riwayat' ? 'active' : '' }}"
            onclick="switchTab('riwayat')">

        <span>Riwayat</span>

    </button>

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

    border:1px solid var(--border);

    box-shadow:var(--shadow-sm);
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

    font-size:14px;
    font-weight:600;

    color:#9CA3AF;

    transition:.3s ease;

    border: none;
    background: transparent;
    outline: none;
    font-family: inherit;
    cursor: pointer;
}

/* =========================
   ACTIVE
========================= */

.tab-btn.active{

    background:linear-gradient(
        135deg,
        #E28743,
        #D47735
    );

    color:white;

    box-shadow:
        0 4px 16px var(--primary-glow);
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

    background:var(--primary-light);

    color:var(--primary);
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