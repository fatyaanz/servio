<div class="category-tabs">

    <!-- KATEGORI AKTIF -->

    <a
        href="?tab=active"
        class="category-tab 
        {{ request('tab') != 'pending' ? 'active' : '' }}"
    >

        Kategori Aktif

        <span class="tab-badge">
            {{ $activeCategories }}
        </span>

    </a>

    <!-- PENGAJUAN -->

    <a
        href="?tab=pending"
        class="category-tab
        {{ request('tab') == 'pending' ? 'active' : '' }}"
    >

        Pengajuan Kategori

        <span class="tab-badge">
            {{ $pendingCategories }}
        </span>

    </a>

</div>

<style>

/* =========================
   TABS WRAPPER
========================= */

.category-tabs{

    display:flex;

    align-items:center;

    gap:14px;

    margin-bottom:24px;

    flex-wrap:wrap;

}

/* =========================
   TAB
========================= */

.category-tab{

    text-decoration:none;

    padding:14px 20px;

    border-radius:18px;

    background:white;

    color:#6b7280;

    font-size:14px;

    font-weight:600;

    display:flex;

    align-items:center;

    gap:12px;

    transition:.25s ease;

    border:1px solid #edf2f7;

    box-shadow:
    0 4px 18px rgba(15,23,42,0.04);

}

/* ACTIVE */

.category-tab.active{

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    border-color:transparent;

    box-shadow:
    0 10px 24px rgba(255,122,0,0.18);

}

/* BADGE */

.category-tab span{

    width:30px;
    height:30px;

    border-radius:999px;

    background:#f3f4f6;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:12px;

    font-weight:700;

    color:#111827;

    flex-shrink:0;

}

/* ACTIVE BADGE */

.category-tab.active span{

    background:rgba(255,255,255,0.18);

    color:white;

}

/* HOVER */

.category-tab:hover{

    transform:translateY(-2px);

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .category-tabs{

        overflow-x:auto;

        flex-wrap:nowrap;

        padding-bottom:4px;

    }

    .category-tab{

        min-width:max-content;

        padding:12px 18px;

        font-size:13px;

    }

    .category-tab span{

        width:28px;
        height:28px;

        font-size:11px;

    }

}

</style>