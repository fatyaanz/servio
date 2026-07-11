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
        <div style="display: flex; gap: 14px; align-items: center;">
            <div class="active-icon">
                @if($category && $category->icon)
                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="width: 28px; height: 28px; object-fit: contain;">
                @else
                    <i class='bx bx-wrench' style="font-size:24px; color:var(--primary);"></i>
                @endif
            </div>
            <div>
                <h3 style="margin: 0; font-size: 16px; color: #000; font-weight: 700;">{{ $category->name ?? 'Layanan' }}</h3>
                <p style="margin: 4px 0 0; font-size: 13px; color: #626B7A;">
                    Penyedia: <strong>{{ $booking->provider->name }}</strong>
                </p>
                <p style="margin: 4px 0 0; font-size: 12px; color: #9CA3AF; display:flex; align-items:center; gap:6px;">
                    <i class='bx bx-calendar' style="font-size:14px;"></i>
                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                    <span style="margin:0 2px;">•</span>
                    <i class='bx bx-time-five' style="font-size:14px;"></i>
                    {{ substr($booking->booking_time, 0, 5) }}
                </p>
            </div>
        </div>
        
        <div class="status-badge-new {{ $booking->status }}">
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
        <i class='bx bx-navigation' style="font-size:16px;"></i>
        Lacak Pesanan
    </a>
</div>

<style>
.active-booking-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 18px;
    margin-bottom: 24px;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
}

.active-booking-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.active-booking-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--gray-100);
    padding-bottom: 12px;
    margin-bottom: 14px;
}

.active-pulse {
    width: 8px;
    height: 8px;
    background: var(--primary);
    border-radius: 50%;
    display: inline-block;
    animation: activePulseAnim 1.5s infinite;
}

@keyframes activePulseAnim {
    0% { transform: scale(0.9); opacity: 1; }
    50% { transform: scale(1.3); opacity: 0.5; }
    100% { transform: scale(0.9); opacity: 1; }
}

.active-title {
    font-size: 12px;
    font-weight: 700;
    color: var(--primary);
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
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: var(--primary-light);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink:0;
}

.active-track-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap:6px;
    background: var(--primary);
    color: white;
    font-size: 13px;
    font-weight: 600;
    padding: 11px;
    border-radius: var(--radius-md);
    text-decoration: none;
    transition: var(--transition);
}

.active-track-btn:hover {
    background: var(--primary-hover);
    transform:translateY(-1px);
}
</style>
