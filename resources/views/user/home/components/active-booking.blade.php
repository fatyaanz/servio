@php
$category = $booking->subServices->first()?->providerService?->category;
@endphp

<div class="active-booking-card">
    <div class="active-booking-header">
        <div style="display: flex; align-items: center; gap: 8px;">
            <span class="active-pulse"></span>
            <span class="active-title">Pesanan Sedang Berjalan</span>
        </div>
        <span class="active-code">#{{ $booking->formatted_id }}</span>
    </div>
    
    <div class="active-booking-body">
        <div style="display: flex; gap: 15px; align-items: center;">
            <div class="active-icon">
                @if($category && $category->icon)
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="width: 32px; height: 32px; object-fit: contain;">
                @else
                    🛠️
                @endif
            </div>
            <div>
                <h4 style="margin: 0; font-size: 16px; color: #1F2937; font-weight: 700;">{{ $category->name ?? 'Layanan' }}</h4>
                <p style="margin: 4px 0 0; font-size: 13px; color: #6B7280;">
                    Penyedia: <strong>{{ $booking->provider->name }}</strong>
                </p>
                <p style="margin: 4px 0 0; font-size: 12px; color: #9CA3AF;">
                    📅 {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }} • 🕒 {{ substr($booking->booking_time, 0, 5) }}
                </p>
            </div>
        </div>
        
        <div class="active-booking-status-badge status-{{ $booking->status }}">
            @if($booking->status == 'on_the_way')
                Dalam Perjalanan
            @elseif($booking->status == 'waiting_approval')
                Menunggu Estimasi
            @elseif($booking->status == 'working')
                Pengerjaan
            @elseif($booking->status == 'payment')
                Menunggu Pembayaran
            @else
                {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
            @endif
        </div>
    </div>

    <a href="{{ route('detail.aktifitas', $booking->id) }}" class="active-track-btn">
        Lacak Pesanan →
    </a>
</div>

<style>
.active-booking-card {
    background: white;
    border: 1px solid #FFE6D0;
    border-radius: 20px;
    padding: 18px;
    margin-bottom: 24px;
    box-shadow: 0 10px 25px rgba(240, 138, 40, 0.05);
    transition: 0.3s;
}

.active-booking-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(240, 138, 40, 0.08);
}

.active-booking-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #F3F4F6;
    padding-bottom: 12px;
    margin-bottom: 14px;
}

.active-pulse {
    width: 8px;
    height: 8px;
    background: #F08A28;
    border-radius: 50%;
    display: inline-block;
    animation: activePulseAnim 1.5s infinite;
}

@keyframes activePulseAnim {
    0% {
        transform: scale(0.9);
        opacity: 1;
    }
    50% {
        transform: scale(1.3);
        opacity: 0.5;
    }
    100% {
        transform: scale(0.9);
        opacity: 1;
    }
}

.active-title {
    font-size: 12px;
    font-weight: 700;
    color: #F08A28;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.active-code {
    font-size: 13px;
    font-weight: 600;
    color: #9CA3AF;
}

.active-booking-body {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 12px;
}

.active-icon {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    background: #FFF7EE;
    display: flex;
    align-items: center;
    justify-content: center;
}

.active-booking-status-badge {
    padding: 6px 12px;
    border-radius: 99px;
    font-size: 12px;
    font-weight: 700;
    text-transform: capitalize;
}

.active-booking-status-badge.status-pending { background: #FEF3C7; color: #D97706; }
.active-booking-status-badge.status-accepted { background: #DBEAFE; color: #2563EB; }
.active-booking-status-badge.status-on_the_way { background: #E0F2FE; color: #0284C7; }
.active-booking-status-badge.status-diagnosis { background: #F3E8FF; color: #9333EA; }
.active-booking-status-badge.status-waiting_approval { background: #FFF7ED; color: #EA580C; }
.active-booking-status-badge.status-approved { background: #DCFCE7; color: #16A34A; }
.active-booking-status-badge.status-working { background: #D1FAE5; color: #059669; }
.active-booking-status-badge.status-payment { background: #CFFAFE; color: #0891B2; }

.active-track-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #F08A28;
    color: white;
    font-size: 13px;
    font-weight: 700;
    padding: 12px;
    border-radius: 12px;
    text-decoration: none;
    transition: 0.2s;
}

.active-track-btn:hover {
    background: #E67C14;
}
</style>
