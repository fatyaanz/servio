<div class="empty-state">

    <div class="empty-icon">

        <i class='bx bx-category'></i>

    </div>

    <h2>
        Belum Ada Kategori
    </h2>

    <p>
        Data kategori layanan belum tersedia.
        Tambahkan kategori baru untuk mulai mengelola layanan Servio.
    </p>

    <button
        class="empty-btn"
        onclick="openAddCategoryModal()"
    >

        <i class='bx bx-plus'></i>

        Tambah Kategori

    </button>

</div>

<style>

/* =========================
    EMPTY STATE
========================= */

.empty-state{

    background:white;

    border:1px solid var(--border);

    border-radius:20px;

    padding:60px 24px;

    text-align:center;

    box-shadow:var(--shadow-sm);

}

/* =========================
    ICON
========================= */

.empty-icon{

    width:90px;
    height:90px;

    margin:0 auto 20px;

    border-radius:20px;

    background:#FFF4E6;

    display:flex;

    align-items:center;
    justify-content:center;

    color:var(--primary);

    font-size:42px;

}

/* =========================
    TITLE
========================= */

.empty-state h2{

    font-size:24px;

    font-weight:600;

    color:var(--text-dark);

    margin-bottom:10px;

}

/* =========================
    DESCRIPTION
========================= */

.empty-state p{

    max-width:420px;

    margin:0 auto 24px;

    color:var(--text-secondary);

    font-size:14px;

    line-height:1.7;

}

/* =========================
    BUTTON
========================= */

.empty-btn{

    display:inline-flex;

    align-items:center;

    gap:8px;

    border:none;

    padding:12px 20px;

    border-radius:12px;

    background:var(--primary);

    color:white;

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

.empty-btn:hover{

    opacity:.95;

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .empty-state{

        padding:50px 20px;

    }

    .empty-state h2{

        font-size:22px;

    }

}

</style>