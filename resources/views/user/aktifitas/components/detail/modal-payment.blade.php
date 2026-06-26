@php
$serviceFee = $booking->diagnosis?->service_fee ?? 0;
$sparepartTotal = 0;

foreach ($booking->diagnosis?->produks ?? [] as $produk) {
    if ($produk->pivot->is_selected) {
        $sparepartTotal += $produk->harga * $produk->pivot->qty;
    }
}

$appFee = 5000;
$total = $serviceFee + $sparepartTotal + $appFee;
@endphp

<div class="modal-overlay" id="paymentModal">

    <div class="modal-card">

        <!-- HEADER -->

        <div class="modal-header">

            <h2>Kirim Bukti Pembayaran</h2>

            <button
                class="close-modal"
                onclick="closePaymentModal()">

                ✕

            </button>

        </div>

        <!-- FORM -->

        <form action="{{ route('booking.pay', $booking->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="transfer-info" style="background: #FFFDF8; border: 1px solid #FFE0B2; padding: 16px; border-radius: 16px; margin-bottom: 25px; text-align: left;">
                <div style="font-weight: 700; font-size: 14px; color: #F08A28; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                    ℹ️ Instruksi Pembayaran
                </div>
                <p style="margin: 0; font-size: 13px; color: #555; line-height: 1.6;">
                    Silakan lakukan transfer ke rekening/e-wallet Penyedia Jasa (teknisi Anda) sebesar 
                    <strong style="color: #F08A28; font-size: 15px;">Rp{{ number_format($total, 0, ',', '.') }}</strong>. 
                    Setelah transfer selesai, silakan unggah foto atau tangkapan layar bukti pembayaran di bawah ini.
                </p>
            </div>

            <div class="form-group">

                <label>Unggah Bukti Transfer <span style="color: #EF4444;">*</span></label>

                <input 
                    type="file" 
                    name="payment_proof" 
                    accept="image/*" 
                    required 
                    style="width: 100%; padding: 12px; border: 1px dashed #F08A28; border-radius: 16px; background: #FFFDFB; cursor: pointer; box-sizing: border-box;"
                >

                <small style="display: block; color: #9CA3AF; margin-top: 6px; font-size: 12px; text-align: left;">Format: JPG, PNG, JPEG. Maksimal: 2MB.</small>

            </div>

            <!-- BUTTON ACTION -->

            <div class="modal-actions">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closePaymentModal()">

                    Batal

                </button>

                <button
                    type="submit"
                    class="save-btn">

                    Kirim Bukti

                </button>

            </div>

        </form>

    </div>

</div>

<style>

/* =========================
   MODAL LAYOUT SYSTEM
========================= */

.modal-overlay{
    position:fixed;
    inset:0;
    display:none;
    align-items:center;
    justify-content:center;
    padding:20px;
    background:rgba(0,0,0,.55);
    backdrop-filter:blur(8px);
    z-index:9999;
}

.modal-overlay.active{
    display:flex;
    animation:fadeIn .25s ease;
}

@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes slideUp{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}

.modal-card{
    width:100%;
    max-width:560px;
    background:#FFFFFF;
    border-radius:28px;
    padding:35px;
    box-shadow:0 25px 60px rgba(0,0,0,.18);
    animation:slideUp .3s ease;
    box-sizing: border-box;
}

.modal-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.modal-header h2{
    font-size:26px;
    font-weight:700;
    color:#1F2937;
    margin:0;
}

.close-modal{
    width:42px;
    height:42px;
    border:none;
    border-radius:12px;
    background:#F3F4F6;
    cursor:pointer;
    font-size:18px;
    transition:.25s;
    display:flex;
    align-items:center;
    justify-content:center;
}

.close-modal:hover{
    background:#E5E7EB;
    transform:rotate(90deg);
}

.form-group{
    margin-bottom:20px;
    display:flex;
    flex-direction:column;
    text-align: left;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    color:#374151;
    font-size:14px;
    font-weight:600;
}

.modal-actions{
    display:flex;
    gap:12px;
    margin-top:30px;
}

.cancel-btn{
    flex:1;
    height:58px;
    border:none;
    border-radius:16px;
    background:#F3F4F6;
    color:#374151;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
    transition:.25s;
}

.cancel-btn:hover{
    background:#E5E7EB;
}

.save-btn{
    flex:2;
    height:58px;
    border:none;
    border-radius:16px;
    background:linear-gradient(135deg, #F08A28, #FF9F43);
    color:white;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
    transition:.25s;
}

.save-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 25px rgba(240,138,40,.35);
}

.save-btn:active{
    transform:scale(.98);
}

</style>

<script>

function openPaymentModal(){
    document
        .getElementById('paymentModal')
        .classList.add('active');
}

function closePaymentModal(){
    document
        .getElementById('paymentModal')
        .classList.remove('active');
}

/* Klik area gelap untuk menutup */
document
.getElementById('paymentModal')
.addEventListener('click', function(e){
    if(e.target === this){
        closePaymentModal();
    }
});

</script>
