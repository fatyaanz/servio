<div class="booking-bar">

    <div class="booking-price">

        <span class="price-label">
            Estimasi Harga
        </span>

        <h3>
            Rp100.000 - Rp200.000
        </h3>

    </div>

    <a
        href="{{ route(
            'pilih.layanan',
            $provider->id
        ) }}"
        class="booking-button"
    >
        Booking Sekarang
    </a>

</div>

<style>

/* =========================
   BOOKING BAR
========================= */

.booking-bar{

    position:fixed;

    left:50%;
    bottom:20px;

    transform:translateX(-50%);

    width:calc(100% - 40px);
    max-width:1200px;

    padding:18px 22px;

    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.4);

    border-radius:24px;

    box-shadow:
        0 15px 40px rgba(0,0,0,.10);

    z-index:9999;
}

/* =========================
   PRICE
========================= */

.booking-price{
    flex:1;
}

.price-label{

    display:block;

    color:#888;

    font-size:13px;
    font-weight:500;

    margin-bottom:4px;
}

.booking-price h3{

    margin:0;

    font-size:24px;
    font-weight:800;

    color:#222;

    line-height:1.2;
}

/* =========================
   BUTTON
========================= */

.booking-button{

    min-width:220px;

    display:flex;
    justify-content:center;
    align-items:center;

    text-decoration:none;

    padding:16px 26px;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    font-size:15px;
    font-weight:700;

    box-shadow:
        0 10px 25px rgba(240,138,40,.25);

    transition:.3s ease;
}

.booking-button:hover{

    transform:
        translateY(-2px)
        scale(1.02);

    box-shadow:
        0 15px 30px rgba(240,138,40,.35);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .booking-bar{
        width:calc(100% - 30px);
    }

    .booking-price h3{
        font-size:22px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .booking-bar{

        width:calc(100% - 20px);

        bottom:10px;

        padding:14px;

        border-radius:20px;

        gap:12px;
    }

    .booking-price h3{

        font-size:17px;
    }

    .price-label{

        font-size:12px;
    }

    .booking-button{

        min-width:auto;

        padding:14px 18px;

        font-size:13px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .booking-bar{

        padding:12px;
    }

    .booking-price h3{

        font-size:15px;
    }

    .booking-button{

        padding:12px 16px;

        font-size:12px;
    }

}

</style>