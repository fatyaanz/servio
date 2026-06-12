<div class="payment-card">

    <div class="payment-header">

        <div class="payment-icon">
            💳
        </div>

        <div class="payment-title">

            <span class="payment-badge">
                Menunggu Pembayaran
            </span>

            <h3>
                Pembayaran Layanan
            </h3>

            <p>
                Silakan selesaikan pembayaran untuk melanjutkan proses layanan.
            </p>

        </div>

    </div>

    <!-- INVOICE -->

    <div class="invoice-box">

        <div class="invoice-row">

            <span>
                Biaya Jasa
            </span>

            <strong>
                Rp150.000
            </strong>

        </div>

        <div class="invoice-row">

            <span>
                Biaya Sparepart
            </span>

            <strong>
                Rp230.000
            </strong>

        </div>

        <div class="invoice-divider"></div>

        <div class="invoice-row total">

            <span>
                Total Tagihan
            </span>

            <strong>
                Rp380.000
            </strong>

        </div>

    </div>

    <!-- STATUS -->

    <div class="payment-status">

        <div class="status-icon">
            ⏳
        </div>

        <div>

            <strong>
                Menunggu Pembayaran
            </strong>

            <p>
                Pembayaran belum diterima. Segera lakukan pembayaran untuk melanjutkan proses layanan.
            </p>

        </div>

    </div>

    <!-- BUTTON -->

    <button class="pay-btn">

        💳 Bayar Sekarang

    </button>

</div>

<style>

/* =========================
   CARD
========================= */

.payment-card{

    max-width:1200px;

    margin:20px auto;

    padding:25px;

    border-radius:28px;

    background:#FFFFFF;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);
}

/* =========================
   HEADER
========================= */

.payment-header{

    display:flex;

    align-items:flex-start;

    gap:18px;

    margin-bottom:25px;
}

.payment-icon{

    width:65px;
    height:65px;

    border-radius:20px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#EEF6FF;

    font-size:30px;

    flex-shrink:0;
}

.payment-title{

    flex:1;
}

.payment-badge{

    display:inline-flex;

    padding:8px 14px;

    border-radius:999px;

    background:#FFF8E8;

    color:#D97706;

    font-size:12px;
    font-weight:700;

    margin-bottom:12px;
}

.payment-title h3{

    margin:0;

    color:#222;

    font-size:24px;
    font-weight:800;
}

.payment-title p{

    margin-top:8px;

    color:#777;

    line-height:1.7;
}

/* =========================
   INVOICE
========================= */

.invoice-box{

    background:#FAFAFA;

    border:1px solid #F2F2F2;

    border-radius:20px;

    padding:20px;
}

.invoice-row{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:16px;
}

.invoice-row:last-child{

    margin-bottom:0;
}

.invoice-row span{

    color:#666;

    font-size:15px;
}

.invoice-row strong{

    color:#222;

    font-size:15px;
}

.invoice-divider{

    height:1px;

    background:#EAEAEA;

    margin:18px 0;
}

/* =========================
   TOTAL
========================= */

.total span{

    color:#222;

    font-size:18px;

    font-weight:700;
}

.total strong{

    color:#F08A28;

    font-size:30px;

    font-weight:800;
}

/* =========================
   STATUS
========================= */

.payment-status{

    margin-top:20px;

    display:flex;

    gap:15px;

    padding:18px;

    border-radius:18px;

    background:#FFF8E8;
}

.status-icon{

    width:42px;
    height:42px;

    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:white;

    font-size:20px;

    flex-shrink:0;
}

.payment-status strong{

    color:#D97706;

    display:block;

    margin-bottom:5px;
}

.payment-status p{

    margin:0;

    color:#A16207;

    font-size:14px;

    line-height:1.6;
}

/* =========================
   BUTTON
========================= */

.pay-btn{

    width:100%;

    height:62px;

    margin-top:25px;

    border:none;

    border-radius:18px;

    background:linear-gradient(
        135deg,
        #22C55E,
        #34D399
    );

    color:white;

    font-size:16px;
    font-weight:700;

    cursor:pointer;

    transition:.3s ease;

    box-shadow:
        0 10px 25px rgba(34,197,94,.25);
}

.pay-btn:hover{

    transform:translateY(-2px);

    box-shadow:
        0 15px 30px rgba(34,197,94,.35);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .payment-card{

        margin:15px;

        padding:20px;
    }

    .payment-header{

        gap:12px;
    }

    .payment-icon{

        width:52px;
        height:52px;

        font-size:24px;
    }

    .payment-title h3{

        font-size:20px;
    }

    .total strong{

        font-size:24px;
    }

    .payment-status{

        flex-direction:column;
    }

}

</style>