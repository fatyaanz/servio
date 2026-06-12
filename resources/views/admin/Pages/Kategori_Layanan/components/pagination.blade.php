<div class="pagination-wrapper">

    <button class="pagination-btn">

        <i class='bx bx-chevron-left'></i>

    </button>

    <button class="pagination-number active">

        1

    </button>

    <button class="pagination-number">

        2

    </button>

    <button class="pagination-number">

        3

    </button>

    <button class="pagination-number">

        4

    </button>

    <button class="pagination-btn">

        <i class='bx bx-chevron-right'></i>

    </button>

</div>

<style>

/* =========================
    PAGINATION
========================= */

.pagination-wrapper{

    display:flex;

    justify-content:center;
    align-items:center;

    gap:10px;

    margin-top:28px;

    flex-wrap:wrap;

}

/* =========================
    BUTTON
========================= */

.pagination-btn,
.pagination-number{

    width:42px;
    height:42px;

    display:flex;

    align-items:center;
    justify-content:center;

    border:1px solid var(--border);

    border-radius:12px;

    background:white;

    color:var(--text-secondary);

    font-size:14px;

    font-weight:600;

    cursor:pointer;

    transition:.3s;

}

/* =========================
    ACTIVE
========================= */

.pagination-number.active{

    background:var(--primary);

    color:white;

    border-color:var(--primary);

}

/* =========================
    HOVER
========================= */

.pagination-btn:hover,
.pagination-number:hover{

    border-color:var(--primary);

    color:var(--primary);

    transform:translateY(-2px);

}

.pagination-number.active:hover{

    color:white;

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .pagination-wrapper{

        gap:8px;

    }

    .pagination-btn,
    .pagination-number{

        width:38px;
        height:38px;

        font-size:13px;

    }

}

</style>