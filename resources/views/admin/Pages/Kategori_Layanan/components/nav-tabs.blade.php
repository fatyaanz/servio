<div class="category-tabs">

    <!-- KATEGORI AKTIF -->

    <a
        href="?tab=active"
        class="category-tab {{ request('tab') != 'pending' ? 'active' : '' }}"
    >

        <i class='bx bx-category'></i>

        Kategori Aktif

        <span class="tab-badge">
            {{ $activeCategories }}
        </span>

    </a>

    <!-- PENGAJUAN -->

    <a
        href="?tab=pending"
        class="category-tab {{ request('tab') == 'pending' ? 'active' : '' }}"
    >

        <i class='bx bx-time-five'></i>

        Pengajuan Kategori

        <span class="tab-badge">
            {{ $pendingCategories }}
        </span>

    </a>

</div>

<style>

/* =========================
    TAB WRAPPER
========================= */

.category-tabs{

    display:flex;

    align-items:center;

    gap:16px;

    margin-top:20px;
    margin-bottom:28px;

    flex-wrap:wrap;

}

/* =========================
    TAB BUTTON
========================= */

.category-tab{

    display:flex;

    align-items:center;

    gap:10px;

    padding:14px 20px;

    border-radius:14px;

    background:white;

    border:1px solid var(--border);

    text-decoration:none;

    color:var(--text-secondary);

    font-size:14px;
    font-weight:600;

    transition:.3s;

}

/* ICON */

.category-tab i{

    font-size:18px;

}

/* ACTIVE */

.category-tab.active{

    background:linear-gradient(
        135deg,
        var(--primary),
        #ffb347
    );

    color:white;

    border-color:transparent;

}

/* BADGE */

.tab-badge{

    display:flex;

    align-items:center;
    justify-content:center;

    min-width:28px;
    height:28px;

    padding:0 8px;

    border-radius:999px;

    background:#FFF4E6;

    color:var(--primary);

    font-size:12px;
    font-weight:600;

}

/* ACTIVE BADGE */

.category-tab.active .tab-badge{

    background:rgba(255,255,255,.2);

    color:white;

}

/* HOVER */

.category-tab:hover{

    transform:translateY(-2px);

    border-color:var(--primary);

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

    }

}

</style>