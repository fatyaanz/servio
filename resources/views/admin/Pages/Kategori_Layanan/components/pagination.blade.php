<div class="pagination-wrapper">

    <!-- PREVIOUS -->
    <button class="pagination-btn">

        ←

    </button>

    <!-- NUMBER -->

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

    <!-- NEXT -->

    <button class="pagination-btn">

        →

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

    gap:12px;

    margin-top:34px;

    flex-wrap:wrap;

}

/* =========================
    BUTTON
========================= */

.pagination-btn,
.pagination-number{

    width:50px;
    height:50px;

    border:none;

    border-radius:16px;

    background:#f8fafc;

    color:#64748b;

    font-size:15px;

    font-weight:700;

    cursor:pointer;

    transition:0.25s ease;

    border:1px solid #eef2f7;

}

/* ACTIVE */

.pagination-number.active{

    background:linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    border-color:transparent;

    box-shadow:
    0 10px 20px rgba(255,122,0,0.18);

}

/* HOVER */

.pagination-btn:hover,
.pagination-number:hover{

    transform:translateY(-2px);

}

/* =========================
    RESPONSIVE
========================= */

@media(max-width:768px){

    .pagination-wrapper{

        gap:10px;

    }

    .pagination-btn,
    .pagination-number{

        width:44px;
        height:44px;

        font-size:14px;

    }

}

</style>