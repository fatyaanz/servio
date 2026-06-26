<div class="booking-address-card">
    <div class="card-header" style="display: flex; align-items: center; gap: 15px; border-bottom: 1px solid #F1F5F9; padding-bottom: 18px; margin-bottom: 18px;">
        <div class="header-icon" style="background: #FFF6EE; color: #F08A28; width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
            📍
        </div>
        <div>
            <h3 style="margin: 0; color: #0F172A; font-size: 20px; font-weight: 800;">Alamat & Jadwal Kunjungan</h3>
            <p style="margin-top: 4px; color: #64748B; font-size: 13px; margin-bottom: 0;">Detail pelanggan, lokasi, dan waktu layanan</p>
        </div>
        <div class="order-badge" style="margin-left: auto; background: #FFF6EE; border: 1px solid rgba(240, 138, 40, 0.2); color: #F08A28; font-weight: 700; font-size: 13px; padding: 6px 14px; border-radius: 10px;">
            #{{ $booking->formatted_id }}
        </div>
    </div>

    <div class="address-details-body" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
        <div class="detail-section">
            <div style="font-size: 12px; font-weight: 700; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">👤 Pelanggan</div>
            <div style="font-size: 16px; color: #0F172A; font-weight: 700; margin-bottom: 15px;">
                {{ $booking->customer->name }}
            </div>

            <div style="font-size: 12px; font-weight: 700; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">📍 Lokasi Layanan</div>
            <div style="font-size: 14px; color: #334155; font-weight: 600; line-height: 1.6;">
                {{ $booking->address }}
            </div>
            @if($booking->location_note)
                <div style="margin-top: 8px; font-size: 13px; color: #475569; background: #F8FAFC; padding: 10px 14px; border-radius: 10px; border-left: 4px solid #F08A28; font-weight: 500;">
                    <strong>Catatan Lokasi:</strong> {{ $booking->location_note }}
                </div>
            @endif
        </div>
        
        <div class="detail-section" style="border-left: 1px solid #E2E8F0; padding-left: 24px;">
            <div style="font-size: 12px; font-weight: 700; color: #94A3B8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">📅 Waktu Kunjungan</div>
            <div style="font-size: 15px; color: #0F172A; font-weight: 700; display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                <span>📅</span>
                <span>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }}</span>
            </div>
            <div style="font-size: 15px; color: #0F172A; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                <span>🕒</span>
                <span>{{ substr($booking->booking_time, 0, 5) }} WIB</span>
            </div>
        </div>
    </div>
</div>

<style>
.booking-address-card {
    margin: 20px;
    padding: 24px;
    background: #ffffff;
    border-radius: 24px;
    border: 1px solid #E2E8F0;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
}

@media(max-width: 768px) {
    .booking-address-card {
        margin: 15px;
        padding: 20px;
    }
    .address-details-body {
        grid-template-columns: 1fr !important;
        gap: 20px !important;
    }
    .detail-section {
        border-left: none !important;
        padding-left: 0 !important;
    }
}
</style>
