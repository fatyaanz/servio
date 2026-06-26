<div class="modal-overlay" id="paymentModal">

    <div class="modal-card large">

        <div class="modal-header">

            <h2>
                Metode Pembayaran
            </h2>

            <button
                class="close-modal"
                onclick="closePaymentModal()">

                ✕

            </button>

        </div>

        <div style="background:#F9FAFB; border-radius:14px; padding:20px; font-size:14px; color:#555; line-height:1.7; text-align: center; border: 1px solid #ECECEC;">
            💡 <strong>Sistem Pembayaran Terverifikasi</strong><br>
            Semua pembayaran pesanan di Servio dilakukan secara langsung via transfer bank atau tunai. Anda dapat mengunggah bukti pembayaran pada detail aktivitas pesanan Anda untuk diverifikasi oleh penyedia jasa.
        </div>

        <button class="add-payment-btn" onclick="closePaymentModal()">
            Tutup
        </button>

    </div>

</div>

<style>
    .payment-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:16px;

    border:1px solid #EEEEEE;

    border-radius:16px;

    margin-bottom:12px;

    transition:.3s ease;
}

.payment-item:hover{

    border-color:#F08A28;
}

.payment-info{

    display:flex;

    align-items:center;

    gap:15px;
}

.payment-icon{

    width:50px;
    height:50px;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:14px;

    background:#F8F8F8;

    font-size:22px;
}

.payment-info h4{

    margin:0;

    color:#222;
}

.payment-info p{

    margin-top:4px;

    color:#777;

    font-size:13px;
}

.active-badge{

    padding:6px 12px;

    border-radius:999px;

    background:#EAF7EC;

    color:#22C55E;

    font-size:12px;

    font-weight:700;
}

.add-payment-btn{

    width:100%;

    height:55px;

    border:none;

    border-radius:14px;

    background:#F08A28;

    color:white;

    font-weight:700;

    cursor:pointer;

    margin-top:10px;
}
</style>