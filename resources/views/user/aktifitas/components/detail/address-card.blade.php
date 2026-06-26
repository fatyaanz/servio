<div class="booking-address-card">
    <div class="card-header">
        <div class="header-icon" style="background: #FFF6EE; color: #F08A28; width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px;">
            📍
        </div>
        <div>
            <h3 style="margin: 0; color: #222; font-size: 20px; font-weight: 800;">Alamat & Jadwal Layanan</h3>
            <p style="margin-top: 4px; color: #888; font-size: 13px; margin-bottom: 0;">Detail lokasi dan waktu kunjungan teknisi</p>
        </div>
        <div class="order-badge" style="margin-left: auto; background: #FFF6EE; border: 1px solid rgba(240, 138, 40, 0.2); color: #F08A28; font-weight: 700; font-size: 13px; padding: 6px 14px; border-radius: 10px;">
            #{{ $booking->formatted_id }}
        </div>
    </div>

    <div class="address-details-body" style="margin-top: 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="detail-section">
            <div style="font-size: 13px; font-weight: 700; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">📍 Lokasi</div>
            <div style="font-size: 15px; color: #374151; font-weight: 600; line-height: 1.6;">
                {{ $booking->address }}
            </div>
            @if($booking->location_note)
                <div style="margin-top: 8px; font-size: 13px; color: #6B7280; background: #F9FAFB; padding: 8px 12px; border-radius: 8px; border-left: 3px solid #F08A28;">
                    <strong>Catatan:</strong> {{ $booking->location_note }}
                </div>
            @endif
        </div>
        
        <div class="detail-section" style="border-left: 1px solid #F3F4F6; padding-left: 20px;">
            <div style="font-size: 13px; font-weight: 700; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">📅 Jadwal Kunjungan</div>
            <div style="font-size: 15px; color: #374151; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                <span>📅</span>
                <span>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d F Y') }}</span>
            </div>
            <div style="margin-top: 6px; font-size: 15px; color: #374151; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                <span>🕒</span>
                <span>{{ substr($booking->booking_time, 0, 5) }} WIB</span>
            </div>
        </div>
    </div>
</div>

<style>
.booking-address-card {
    max-width: 1200px;
    margin: 20px auto;
    padding: 25px;
    border-radius: 28px;
    background: #FFFFFF;
    border: 1px solid rgba(240, 138, 40, 0.08);
    box-shadow: 0 10px 25px rgba(0,0,0,.05);
}

@media(max-width: 768px) {
    .booking-address-card {
        margin: 15px;
        padding: 20px;
    }
    .address-details-body {
        grid-template-columns: 1fr !important;
        gap: 15px !important;
    }
    .detail-section {
        border-left: none !important;
        padding-left: 0 !important;
    }
}
</style>
