<div class="continue-section">

    <button
        type="submit"
        class="continue-btn"
    >

        <span>
            Booking sekarang
        </span>

        <svg width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none">

            <path
                d="M5 12H19M19 12L13 6M19 12L13 18"
                stroke="currentColor"
                stroke-width="2.5"
                stroke-linecap="round"
                stroke-linejoin="round"/>

        </svg>

    </button>

</div>

<style>

/* =========================
   CONTINUE SECTION
========================= */

.continue-section{

    max-width:1400px;

    margin:40px auto 120px;

    padding:0 30px;
}

/* =========================
   BUTTON
========================= */

.continue-btn{

    width:100%;
    height:64px;

    border:none;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:10px;

    cursor:pointer;

    border-radius:20px;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    font-size:17px;
    font-weight:700;

    box-shadow:
        0 12px 30px rgba(240,138,40,.25);

    transition:all .3s ease;
    appearance:none;
-webkit-appearance:none;
outline:none;
}

.continue-btn:hover{

    transform:
        translateY(-2px);

    box-shadow:
        0 18px 35px rgba(240,138,40,.35);
}

.continue-btn:hover svg{

    transform:translateX(4px);
}

.continue-btn svg{

    transition:.3s ease;
}

.continue-btn:active{

    transform:translateY(0);
}

/* =========================
   DISABLED
========================= */

.continue-btn:disabled{

    background:#DADADA;

    color:#888;

    cursor:not-allowed;

    box-shadow:none;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .continue-section{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .continue-section{

        padding:0 15px;

        margin-bottom:100px;
    }

    .continue-btn{

        height:56px;

        font-size:15px;

        border-radius:16px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .continue-btn{

        height:52px;

        font-size:14px;
    }

}

</style>