<div class="pagination">

    <div>
        Menampilkan 1 - 6 dari 128 penyedia
    </div>

    <div class="pages">

        <button class="page-btn">
            ‹
        </button>

        <button class="page-btn active">
            1
        </button>

        <button class="page-btn">
            2
        </button>

        <button class="page-btn">
            ›
        </button>

    </div>

</div>

<style>

/* =========================
    PAGINATION
========================= */

.pagination{

    display:flex;

    justify-content:space-between;
    align-items:center;

    margin-top:28px;

    gap:16px;

    flex-wrap:wrap;

    color:#6b7280;

    font-size:14px;

}

.pages{

    display:flex;

    align-items:center;

    gap:10px;

}

/* =========================
    PAGE BUTTON
========================= */

.page-btn{

    width:42px;
    height:42px;

    border:none;

    border-radius:14px;

    background:#f3f4f6;

    color:#475569;

    font-size:14px;
    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

    display:flex;

    justify-content:center;
    align-items:center;

}

/* ACTIVE */

.page-btn.active{

    background:linear-gradient(
        135deg,
        #ff9a3d,
        #ff7a00
    );

    color:white;

    box-shadow:
    0 8px 18px rgba(255,122,0,0.18);

}

/* HOVER */

.page-btn:hover{

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .pagination{

        flex-direction:column;

        align-items:flex-start;

    }

}

</style>