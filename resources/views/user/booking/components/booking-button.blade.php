<div class="booking-footer">

    <div class="booking-summary">

        <span class="summary-label">
            Total Estimasi
        </span>

        <span class="summary-price">
            Rp100.000 - Rp200.000
        </span>

    </div>

    <button
        type="submit"
        class="confirm-booking-btn"
    >
        <span>
            Konfirmasi Booking
        </span>

        <svg width="18"
            height="18"
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
   FOOTER
========================= */

.booking-footer{

    position:sticky;

    bottom:15px;

    max-width:1000px;

    margin:35px auto;

    padding:18px;

    border-radius:24px;

    background:rgba(255,255,255,.92);

    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 15px 40px rgba(0,0,0,.08);

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:20px;

    z-index:100;
}

/* =========================
   SUMMARY
========================= */

.booking-summary{

    display:flex;
    flex-direction:column;

    flex:1;
}

.summary-label{

    color:#888;

    font-size:12px;
    font-weight:600;

    margin-bottom:4px;
}

.summary-price{

    color:#222;

    font-size:24px;
    font-weight:800;

    line-height:1.2;
}

/* =========================
   BUTTON
========================= */

.confirm-booking-btn{

    display:flex;

    align-items:center;

    justify-content:center;

    text-decoration:none;

    min-width:380px;

    height:90px;

    border:none;

    border-radius:24px;

    background:linear-gradient(
        135deg,
        #F39C3D,
        #F08A28
    );

    color:white;

    font-size:28px;

    font-weight:700;

    cursor:pointer;

    transition:.3s ease;
}

.confirm-booking-btn svg{

    transition:.3s ease;
}

.confirm-booking-btn:hover{

    transform:translateY(-2px);

    box-shadow:
        0 15px 30px rgba(240,138,40,.35);
}

.confirm-booking-btn:hover svg{

    transform:translateX(4px);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .booking-footer{

        margin:25px 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .booking-footer{

        margin:20px 15px;

        padding:15px;

        gap:15px;

        flex-direction:column;
        align-items:stretch;
    }

    .booking-summary{

        text-align:center;
    }

    .summary-price{

        font-size:22px;
    }

    .confirm-booking-btn{

        width:100%;

        min-width:auto;

        height:54px;

        font-size:14px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .summary-price{

        font-size:20px;
    }

}

</style>