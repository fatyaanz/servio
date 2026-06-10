<div class="promo-section">

    <div class="section-header">
        <h2>Promo</h2>
    </div>

    <div class="promo-container">

        <div class="promo-ticket">

            <div class="promo-side">
                <span>DISKON</span>
            </div>

            <div class="promo-content">

                <div class="promo-info">
                    <h3>Diskon 20%</h3>
                    <p>Untuk layanan AC dan Mesin Cuci</p>
                </div>

                <button class="claim-btn">
                    Ambil Voucher
                </button>

            </div>

        </div>

        <div class="promo-ticket">

            <div class="promo-side">
                <span>BONUS</span>
            </div>

            <div class="promo-content">

                <div class="promo-info">
                    <h3>Gratis Biaya Survey</h3>
                    <p>Khusus pengguna baru Servio</p>
                </div>

                <button class="claim-btn">
                    Ambil Voucher
                </button>

            </div>

        </div>

    </div>

</div>

<style>

/* =========================
   SECTION
========================= */

.promo-section{
    max-width:1400px;
    margin:30px auto;
    padding:0 30px;
}

.promo-container{
    display:flex;
    flex-direction:column;
    gap:20px;
}

/* =========================
   TICKET
========================= */

.promo-ticket{
    display:flex;

    overflow:hidden;

    border-radius:30px;

    background:#F9F2F1;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.06);

    transition:.3s ease;

    position:relative;
}

.promo-ticket:hover{
    transform:translateY(-5px);
}

/* =========================
   LEFT SIDE
========================= */

.promo-side{
    width:110px;

    background:#9ABB4F;

    display:flex;
    justify-content:center;
    align-items:center;

    position:relative;
}

.promo-side span{
    color:white;

    font-size:22px;
    font-weight:800;

    letter-spacing:2px;

    writing-mode:vertical-rl;
    transform:rotate(180deg);
}

/* sobekan tiket */

.promo-side::after{
    content:"";

    position:absolute;

    right:-15px;
    top:50%;

    transform:translateY(-50%);

    width:30px;
    height:30px;

    border-radius:50%;

    background:white;
}

/* =========================
   CONTENT
========================= */

.promo-content{
    flex:1;

    padding:30px;

    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
}

.promo-info h3{
    margin:0;

    font-size:28px;
    font-weight:800;

    color:#333;
}

.promo-info p{
    margin-top:8px;

    color:#777;

    font-size:15px;
}

/* =========================
   BUTTON
========================= */

.claim-btn{
    border:none;

    background:#9ABB4F;

    color:white;

    padding:16px 35px;

    border-radius:999px;

    font-size:16px;
    font-weight:700;

    cursor:pointer;

    transition:.3s ease;
}

.claim-btn:hover{
    transform:scale(1.05);

    box-shadow:
        0 10px 25px rgba(154,187,79,.35);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .promo-section{
        padding:0 20px;
    }

    .promo-info h3{
        font-size:22px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .promo-section{
        padding:0 15px;
    }

    .promo-ticket{
        flex-direction:column;
    }

    .promo-side{
        width:100%;
        height:70px;
    }

    .promo-side span{
        writing-mode:horizontal-tb;
        transform:none;

        font-size:18px;
    }

    .promo-side::after{
        display:none;
    }

    .promo-content{
        flex-direction:column;
        text-align:center;
    }

    .promo-info h3{
        font-size:20px;
    }

    .claim-btn{
        width:100%;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .promo-info h3{
        font-size:18px;
    }

    .promo-info p{
        font-size:13px;
    }

    .claim-btn{
        padding:14px;
        font-size:14px;
    }

}

</style>