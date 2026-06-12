<div class="pagination">

    <div>
        Menampilkan 1 - 6 dari 128 penyedia
    </div>

    <button class="page-btn">
            <i class='bx bx-chevron-left'></i>
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

    margin-top:24px;

    gap:16px;

    flex-wrap:wrap;

    color:var(--text-secondary);

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

    width:40px;
    height:40px;

    border:1px solid var(--border);

    border-radius:12px;

    background:white;

    color:var(--text-dark);

    font-size:14px;
    font-weight:600;

    cursor:pointer;

    transition:.3s;

    display:flex;
    align-items:center;
    justify-content:center;
}

/* ACTIVE */

.page-btn.active{

    background:var(--primary);

    color:white;

    border-color:var(--primary);
}

/* HOVER */

.page-btn:hover{

    background:#FFF4E6;

    border-color:var(--primary);

    color:var(--primary);
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