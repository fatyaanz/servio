<div class="pagination-container">

    <div class="pagination-wrapper">

        <!-- LEFT -->

        <div class="pagination-info">

            Menampilkan
            <span>
                1-4
            </span>

            dari
            <span>
                50
            </span>

            produk

        </div>

        <!-- RIGHT -->

        <div class="pagination-box">

            <!-- PREV -->

            <button class="pagination-btn">
                ‹
            </button>

            <!-- NUMBER -->

            <button class="pagination-btn active">
                1
            </button>

            <button class="pagination-btn">
                2
            </button>

            <button class="pagination-btn">
                3
            </button>

            <button class="pagination-btn">
                4
            </button>

            <button class="pagination-btn">
                5
            </button>

            <!-- NEXT -->

            <button class="pagination-btn">
                ›
            </button>

        </div>

    </div>

</div>

<style>

/* =========================
    CONTAINER
========================== */

/* =========================
    CONTAINER
========================== */

.pagination-container{

    margin-top:6px;

    background:
    rgba(255,255,255,0.82);

    backdrop-filter:blur(14px);

    border:
    1px solid rgba(255,255,255,0.4);

    border-radius:999px;

    box-shadow:
    0 8px 22px rgba(15,23,42,0.04);

    padding:14px 22px;

}

/* =========================
    WRAPPER
========================== */

.pagination-wrapper{

    display:flex;
    justify-content:space-between;
    align-items:center;

    flex-wrap:wrap;

    gap:18px;

}

/* =========================
    INFO
========================== */

.pagination-info{

    font-size:13px;

    color:#6b7280;

    font-weight:500;

}

.pagination-info span{

    color:#111827;

    font-weight:700;

}

/* =========================
    PAGINATION BOX
========================== */

.pagination-box{

    display:flex;
    align-items:center;

    gap:8px;

}

/* =========================
    BUTTON
========================== */

.pagination-btn{

    width:38px;
    height:38px;

    border:none;

    border-radius:12px;

    background:white;

    border:
    1px solid #eef2f7;

    color:#6b7280;

    font-size:14px;
    font-weight:700;

    cursor:pointer;

    transition:0.3s ease;

}

.pagination-btn:hover{

    transform:translateY(-2px);

    border-color:#ffcf99;

    color:#ff7a00;

}

/* ACTIVE */

.pagination-btn.active{

    background:
    linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    border:none;

    box-shadow:
    0 8px 18px rgba(255,122,0,0.20);

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:768px){

    .pagination-wrapper{

        flex-direction:column;
        align-items:flex-start;

    }

}

</style>