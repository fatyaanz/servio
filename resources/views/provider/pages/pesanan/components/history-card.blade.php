@forelse($bookings as $booking)

@php

$statusClass =
    $booking->status == 'completed'
        ? 'completed'
        : 'cancelled';

$statusText =
    $booking->status == 'completed'
        ? 'Selesai'
        : 'Dibatalkan';

$statusIcon =
    $booking->status == 'completed'
        ? '✅'
        : '❌';

@endphp

<a
    href="{{ route(
        'provider.detail-pesanan',
        $booking->id
    ) }}"
    class="history-card"
>

    <div class="history-status {{ $statusClass }}">

        @if($booking->status == 'completed')

            Selesai
            @if($booking->review)
                • ⭐ {{ number_format($booking->review->rating, 1) }}
            @endif

        @elseif($booking->status == 'cancelled')

            Dibatalkan

        @elseif($booking->status == 'rejected')

            Estimasi Ditolak

        @endif

    </div>

    <div class="history-content">

        <div class="history-avatar">

            {{ strtoupper(
                substr(
                    $booking->customer->name ?? 'U',
                    0,
                    1
                )
            ) }}

        </div>

        <div class="history-info">

            <h3>

                {{ $booking->customer->name }}
                <span style="font-size: 13px; font-weight: 500; color: #94A3B8; margin-left: 8px;">
                    #{{ $booking->formatted_id }}
                </span>

            </h3>

            <div class="history-service">

                @foreach(
                    $booking->subServices
                    as $service
                )

                    {{ $service->name }}

                    @if(!$loop->last)
                        •
                    @endif

                @endforeach

            </div>

            <div class="history-meta">

                📅
                {{ \Carbon\Carbon::parse(
                    $booking->booking_date
                )->format('d M Y') }}

                •

                🕒
                {{ substr(
                    $booking->booking_time,
                    0,
                    5
                ) }}

            </div>

            <div class="history-address">

                📍
                {{ Str::limit(
                    $booking->address,
                    70
                ) }}

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
                        if ($produk->pivot->is_selected) {
                            $sparepartTotal += $produk->harga * $produk->pivot->qty;
                        }
                    }
                    $totalPayable = $serviceFee + $sparepartTotal + 5000;
                @endphp
                <div class="mini-receipt">
                    <div class="mini-receipt-title"> STRUK PEMBAYARAN </div>
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

            →

        </div>

    </div>

</a>

@empty

<div class="empty-history">

    <div class="empty-icon">
        📂
    </div>

    <h3>
        Belum Ada Riwayat
    </h3>

    <p>
        Pesanan yang selesai atau dibatalkan
        akan muncul di sini.
    </p>

</div>

@endforelse

<style>

/* =========================
   HISTORY CARD
========================= */

.history-card{

    display:block;

    max-width:1200px;

    margin:0 auto 20px;

    padding:22px;

    text-decoration:none;

    background:#fff;

    border:1px solid #E2E8F0;

    border-radius:24px;

    transition:.3s ease;

    box-shadow:
        0 8px 24px rgba(15,23,42,.05);
}
.history-status.rejected{

    background:#FFF7E6;

    color:#D97706;

}

.history-card:hover{

    transform:translateY(-4px);

    box-shadow:
        0 15px 30px rgba(15,23,42,.08);
}

/* =========================
   STATUS
========================= */

.history-status{

    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;

    margin-bottom:18px;
}

.history-status.completed{

    background:#ECFDF5;

    color:#16A34A;
}

.history-status.cancelled{

    background:#FEF2F2;

    color:#DC2626;
}

/* =========================
   CONTENT
========================= */

.history-content{

    display:flex;

    align-items:center;

    gap:18px;
}

/* =========================
   AVATAR
========================= */

.history-avatar{

    width:72px;
    height:72px;

    border-radius:20px;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB347
    );

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:26px;

    font-weight:800;

    flex-shrink:0;
}

/* =========================
   INFO
========================= */

.history-info{

    flex:1;
}

.history-info h3{

    margin:0;

    font-size:22px;

    color:#0F172A;

    font-weight:800;
}

.history-service{

    margin-top:8px;

    color:#F08A28;

    font-weight:600;

    font-size:14px;
}

.history-meta{

    margin-top:10px;

    color:#64748B;

    font-size:14px;
}

.history-address{

    margin-top:8px;

    color:#94A3B8;

    font-size:13px;
}

/* =========================
   ARROW
========================= */

.history-arrow{

    width:50px;
    height:50px;

    border-radius:50%;

    background:#FFF7ED;

    color:#F08A28;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:22px;

    font-weight:700;

    transition:.3s ease;
}

.history-card:hover .history-arrow{

    background:#F08A28;

    color:white;

    transform:translateX(4px);
}

/* =========================
   EMPTY STATE
========================= */

.empty-history{

    max-width:1200px;

    margin:40px auto;

    padding:60px 30px;

    text-align:center;

    background:#fff;

    border:2px dashed #CBD5E1;

    border-radius:24px;
}

.empty-icon{

    font-size:60px;

    margin-bottom:15px;
}

.empty-history h3{

    margin-bottom:10px;

    color:#0F172A;
}

.empty-history p{

    color:#64748B;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .history-card{

        margin:0 15px 15px;

        padding:18px;
    }

    .history-content{

        gap:14px;
    }

    .history-avatar{

        width:60px;
        height:60px;

        font-size:20px;
    }

    .history-info h3{

        font-size:18px;
    }

    .history-meta,
    .history-address{

        font-size:12px;
    }

    .history-arrow{

        width:42px;
        height:42px;
    }

}

/* =========================
   MINI RECEIPT
========================= */
.mini-receipt {
    margin-top: 15px;
    padding: 15px;
    background: #FAF8F6;
    border: 1px dashed #F08A28;
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
    color: #F08A28;
    border-top: 1px dotted #CBD5E1;
    margin-top: 6px;
    padding-top: 6px;
    font-size: 14px;
}

</style>