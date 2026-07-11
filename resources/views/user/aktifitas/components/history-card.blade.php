@forelse($bookings as $booking)

@php
$category = $booking->subServices->first()?->providerService?->category;

// Group for dynamic filtering
if ($booking->status == 'completed') {
    $group = 'completed';
} else {
    $group = 'rejected'; // cancelled and rejected statuses map to 'rejected' for filtering
}
@endphp

<a href="{{ route('detail.aktifitas', $booking->id) }}" class="history-card-item" data-status="{{ $group }}">

    <div class="history-status
        @if($booking->status == 'completed')
            completed
        @elseif($booking->status == 'cancelled')
            cancelled
        @elseif($booking->status == 'rejected')
            rejected
        @endif
    ">
        @if($booking->status == 'completed')
            Selesai
            @if($booking->review)
                • <i class='bx bxs-star' style='font-size:12px;'></i> {{ number_format($booking->review->rating, 1) }}
            @endif
        @elseif($booking->status == 'cancelled')
            Dibatalkan
        @elseif($booking->status == 'rejected')
            Estimasi Ditolak
        @endif
    </div>

    <div class="history-content">

        <div class="history-avatar" @if($booking->provider && $booking->provider->business_photo) style="background: url('{{ asset('storage/' . $booking->provider->business_photo) }}') center/cover no-repeat; color: transparent;" @endif>
            @if(!$booking->provider || !$booking->provider->business_photo)
                {{ strtoupper(substr($booking->provider->name ?? ($category->name ?? 'S'), 0, 1)) }}
            @endif
        </div>

        <div class="history-info">

            <h3>
                {{ $booking->provider->name ?? 'Mencari Teknisi' }}
                <span style="font-size: 13px; font-weight: 500; color: #94A3B8; margin-left: 8px;">
                    #{{ $booking->formatted_id }}
                </span>
            </h3>

            <div class="history-service">
                @foreach($booking->subServices as $service)
                    {{ $service->name }}
                    @if(!$loop->last)
                        •
                    @endif
                @endforeach
            </div>

            <div class="history-meta">
                <i class='bx bx-calendar' style="font-size:13px;"></i> {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                •
                <i class='bx bx-time-five' style="font-size:13px;"></i> {{ substr($booking->booking_time, 0, 5) }}
            </div>

            <div class="history-address">
                <i class='bx bx-map' style="font-size:13px;"></i> {{ Str::limit($booking->address, 70) }}
            </div>

            @php
                $damagePhotos = [];
                if ($booking->damage_photo) {
                    if (is_array($booking->damage_photo)) {
                        $damagePhotos = $booking->damage_photo;
                    } else {
                        $decoded = json_decode($booking->damage_photo, true);
                        if (is_array($decoded)) {
                            $damagePhotos = $decoded;
                        } else {
                            $damagePhotos = [$booking->damage_photo];
                        }
                    }
                }
            @endphp

            @if(count($damagePhotos) > 0)
                <div class="history-damage-photos" style="display: flex; gap: 8px; margin-top: 12px; flex-wrap: wrap;" onclick="event.preventDefault(); event.stopPropagation();">
                    @foreach($damagePhotos as $photo)
                        <div style="width: 48px; height: 48px; border-radius: 10px; overflow: hidden; border: 1px solid #ECECEC; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                            <img src="{{ asset('storage/' . $photo) }}" style="width: 100%; height: 100%; object-fit: cover; cursor: pointer;" onclick="window.open('{{ asset('storage/' . $photo) }}', '_blank')">
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- MINI RECEIPT IF COMPLETED --}}
            @if($booking->status == 'completed' && $booking->diagnosis)
                @php
                    $serviceFee = $booking->diagnosis->service_fee;
                    $sparepartTotal = 0;
                    foreach ($booking->diagnosis->produks ?? [] as $produk) {
                        $_pivot = \App\Helpers\PivotHelper::getDiagnosisProdukPivot($booking->diagnosis->id, $produk->id);
                        if ($_pivot['is_selected']) {
                            $sparepartTotal += $produk->harga * $_pivot['qty'];
                        }
                    }
                    $totalPayable = $serviceFee + $sparepartTotal + 5000;
                @endphp
                <div class="mini-receipt">
                    <div class="mini-receipt-title">STRUK PEMBAYARAN</div>
                    <div class="mini-receipt-row">
                        <span>Biaya Jasa:</span>
                        <span>Rp{{ number_format($serviceFee, 0, ',', '.') }}</span>
                    </div>
                    @if($sparepartTotal > 0)
                        <div class="mini-receipt-row">
                            <span>Sparepart:</span>
                            <span>Rp{{ number_format($sparepartTotal, 0, ',', '.') }}</span>
                        </div>
                    @endif
                    <div class="mini-receipt-row">
                        <span>Biaya Aplikasi:</span>
                        <span>Rp5.000</span>
                    </div>
                    <div class="mini-receipt-total">
                        <span>Total Bayar:</span>
                        <span>Rp{{ number_format($totalPayable, 0, ',', '.') }}</span>
                    </div>
                </div>
            @endif

        </div>

        <div class="history-arrow">
            <i class='bx bx-right-arrow-alt'></i>
        </div>

    </div>

</a>

@empty

<div class="history-card-item empty-card">
    <div class="history-info" style="text-align: center; padding: 20px 0;">
        <h3 style="color: #94A3B8; font-size: 18px; font-weight: 600;">Belum Ada Riwayat</h3>
        <p style="color: #94A3B8; font-size: 14px; margin-top: 6px;">Pesanan yang selesai atau dibatalkan akan muncul di sini.</p>
    </div>
</div>

@endforelse

<style>
/* =========================
   HISTORY CARD ITEM
========================= */
.history-card-item {
    display: block;
    max-width: 1200px;
    margin: 0 auto 20px;
    padding: 22px;
    text-decoration: none;
    background: #FFFFFF;
    border: 1px solid var(--border);
    border-radius: 16px;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
}

.history-card-item:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

.history-card-item.empty-card {
    border: 2px dashed #E2E8F0;
    box-shadow: none;
}

.history-card-item.empty-card:hover {
    transform: none;
}

/* =========================
   STATUS BADGE
========================= */
.history-status {
    width: fit-content;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 18px;
}

.history-status.completed {
    background: #ECFDF5;
    color: #16A34A;
}

.history-status.cancelled {
    background: #FEF2F2;
    color: #DC2626;
}

.history-status.rejected {
    background: #FFF7E6;
    color: #D97706;
}

/* =========================
   CONTENT LAYOUT
========================= */
.history-content {
    display: flex;
    align-items: center;
    gap: 18px;
}

/* =========================
   AVATAR / INITIALS
========================= */
.history-avatar {
    width: 72px;
    height: 72px;
    border-radius: 20px;
    background: linear-gradient(135deg, var(--primary), #D47735);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    font-weight: 800;
    flex-shrink: 0;
}

/* =========================
   INFO WRAPPER
========================= */
.history-info {
    flex: 1;
}

.history-info h3 {
    margin: 0;
    font-size: 18px;
    color: #000;
    font-weight: 700;
    line-height: 1.3;
}

.history-service {
    margin-top: 8px;
    color: var(--primary);
    font-weight: 600;
    font-size: 14px;
}

.history-meta {
    margin-top: 10px;
    color: #64748B;
    font-size: 14px;
}

.history-address {
    margin-top: 8px;
    color: #94A3B8;
    font-size: 13px;
}

/* =========================
   ARROW
========================= */
.history-arrow {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: var(--primary-light);
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: 700;
    transition: 0.3s ease;
    flex-shrink: 0;
}

.history-card-item:hover .history-arrow {
    background: var(--primary);
    color: white;
    transform: translateX(3px);
}

/* =========================
   MINI RECEIPT
========================= */
.mini-receipt {
    margin-top: 15px;
    padding: 15px;
    background: #FAF8F6;
    border: 1px dashed var(--primary);
    border-radius: 16px;
    font-family: monospace;
    font-size: 13px;
    color: #475569;
}

.mini-receipt-title {
    text-align: center;
    font-weight: 700;
    margin-bottom: 8px;
    color: #1E293B;
}

.mini-receipt-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 4px;
}

.mini-receipt-total {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    color: var(--primary);
    border-top: 1px dotted #CBD5E1;
    margin-top: 6px;
    padding-top: 6px;
    font-size: 14px;
}

/* =========================
   RESPONSIVE DESIGN
========================= */
@media(max-width:768px){
    .history-card-item {
        margin: 0 15px 15px;
        padding: 16px;
    }
    
    .history-content {
        gap: 14px;
    }
    
    .history-avatar {
        width: 60px;
        height: 60px;
        font-size: 20px;
    }
    
    .history-info h3 {
        font-size: 18px;
    }
    
    .history-meta,
    .history-address {
        font-size: 12px;
    }
    
    .history-arrow {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }
}
</style>