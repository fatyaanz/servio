<div class="payment-verification-card" style="margin: 20px; padding: 24px; background: #ffffff; border-radius: 24px; border: 1px solid #E2E8F0; box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);">
    <div class="card-header" style="display: flex; align-items: center; gap: 15px; border-bottom: 1px solid #F1F5F9; padding-bottom: 18px; margin-bottom: 18px;">
        <div class="header-icon" style="background: #ECFDF5; color: #10B981; width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
            💳
        </div>
        <div>
            <h3 style="margin: 0; color: #0F172A; font-size: 20px; font-weight: 800;">Verifikasi Pembayaran Pelanggan</h3>
            <p style="margin-top: 4px; color: #64748B; font-size: 13px; margin-bottom: 0;">Pelanggan telah mengunggah bukti transfer manual</p>
        </div>
    </div>

    <div class="card-body">
        <div style="font-size: 12px; font-weight: 700; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 10px;"><i class='bx bx-camera'></i> Bukti Pembayaran</div>
        <div style="max-width: 350px; border-radius: 16px; overflow: hidden; border: 1px solid #E2E8F0; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 20px;">
            <a href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank">
                <img src="{{ asset('storage/' . $booking->payment_proof) }}" style="width: 100%; display: block; transition: 0.3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
            </a>
        </div>

        <form action="{{ route('provider.booking.confirm-payment', $booking->id) }}" method="POST">
            @csrf
            <button type="submit" class="confirm-payment-btn" style="width: 100%; height: 56px; border: none; border-radius: 16px; background: linear-gradient(135deg, #10B981, #059669); color: white; font-size: 15px; font-weight: 700; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 10px; box-shadow: 0 8px 20px rgba(16, 185, 129, 0.2);" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                ✅ Konfirmasi Pembayaran & Selesaikan Pesanan
            </button>
        </form>
    </div>
</div>
