<div class="empty-state">

    <!-- ICON -->
    <div class="empty-icon">

        📂

    </div>

    <!-- TEXT -->
    <h2>
        Belum Ada Data
    </h2>

    <p>
        Data kategori layanan belum tersedia
        saat ini. Tambahkan kategori baru
        untuk mulai mengelola layanan Servio.
    </p>

    <!-- BUTTON -->
    <button
        class="empty-btn"
        onclick="openAddCategoryModal()"
    >

        + Tambah Kategori

    </button>

</div>

<style>

/* =========================
    EMPTY STATE
========================= */

.empty-state{

    background:white;

    border-radius:30px;

    padding:70px 30px;

    text-align:center;

    border:1px solid #eef2f7;

    box-shadow:
    0 10px 28px rgba(15,23,42,0.05);

}

/* =========================
    ICON
========================= */

.empty-icon{

    width:120px;
    height:120px;

    margin:0 auto 28px;

    border-radius:30px;

    background:#fff7ed;

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:54px;

}

/* =========================
    TITLE
========================= */

.empty-state h2{

    font-size:34px;

    font-weight:800;

    color:#111827;

    margin-bottom:16px;

}

/* =========================
    DESCRIPTION
========================= */

.empty-state p{

    max-width:520px;

    margin:0 auto 28px;

    color:#6b7280;

    font-size:16px;

    line-height:1.9;

}

/* =========================
    BUTTON
========================= */

.empty-btn{

    border:none;

    padding:16px 24px;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

    box-shadow:
    0 10px 24px rgba(255,122,0,0.18);

}

.empty-btn:hover{

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .empty-state{

        padding:50px 24px;

    }

    .empty-state h2{

        font-size:28px;

    }

    .empty-state p{

        font-size:15px;

    }

}

</style>