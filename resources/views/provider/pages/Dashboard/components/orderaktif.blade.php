<div class="active-order-section">

    <!-- HEADER -->

    <div class="active-header">

        <h2>
            Order aktif
        </h2>

        <a href="{{ route('provider.pesanan') }}">
            Lihat semua
        </a>

    </div>

    <!-- ITEM LOOP -->
    @forelse($activeBookings as $booking)
        @php
            $statusLabels = [
                'accepted' => 'Disetujui',
                'on_the_way' => 'Perjalanan',
                'diagnosis' => 'Diagnosa',
                'waiting_approval' => 'Estimasi',
                'working' => 'Dikerjakan',
                'payment' => 'Pembayaran'
            ];
            $label = $statusLabels[$booking->status] ?? ucfirst(str_replace('_', ' ', $booking->status));
        @endphp
        
        <a href="{{ route('provider.detail-pesanan', $booking->id) }}" class="active-order-card" style="text-decoration: none;">

            <div class="active-left">

                <div class="service-icon">
                    🛠️
                </div>

                <div class="service-info">

                    <h3>
                        {{ $booking->subServices->first()?->providerService?->category?->name ?? 'Layanan' }}
                    </h3>

                    <p>
                        {{ $booking->customer->name }} • #{{ $booking->formatted_id }}
                    </p>

                </div>

            </div>

            <div class="active-right">

                <div class="status-badge" style="background: 
                    @if($booking->status == 'accepted') #e0f2fe; color: #0369a1;
                    @elseif($booking->status == 'on_the_way') #f0fdf4; color: #15803d;
                    @elseif($booking->status == 'diagnosis') #f3e8ff; color: #7e22ce;
                    @elseif($booking->status == 'waiting_approval') #fff7ed; color: #c2410c;
                    @elseif($booking->status == 'working') #f0fdf4; color: #166534;
                    @else #fff8df; color: #d4a300;
                    @endif">
                    {{ $label }}
                </div>

                <span>
                    {{ substr($booking->booking_time, 0, 5) }} WIB
                </span>

            </div>

        </a>
    @empty
        <div class="active-order-card" style="justify-content: center; padding: 25px; color: #888;">
            Belum ada order aktif saat ini.
        </div>
    @endforelse

</div>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

/* =========================
    ACTIVE ORDER SECTION
========================== */

.active-order-section{

    background:rgba(255,255,255,0.72);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border-radius:20px;

    padding:14px;

    border:1px solid rgba(255,255,255,0.35);

    box-shadow:
    0 8px 20px rgba(15,23,42,0.04);

}

/* =========================
    HEADER
========================== */

.active-header{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:12px;

}

.active-header h2{

    font-size:15px;
    font-weight:700;

    color:#111827;

}

.active-header a{

    text-decoration:none;

    color:#ff7a00;

    font-size:11px;
    font-weight:700;

}

/* =========================
    CARD
========================== */

.active-order-card{

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:12px 0;

    border-bottom:1px solid #eef2f7;

    transition:0.3s ease;

}

.active-order-card:last-child{
    border-bottom:none;
}

.active-order-card:hover{

    transform:translateX(2px);

}

/* =========================
    LEFT
========================== */

.active-left{

    display:flex;
    align-items:center;

    gap:10px;

}

.service-icon{

    width:42px;
    height:42px;

    border-radius:14px;

    background:#fff7ed;

    color:#ff7a00;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:18px;

    flex-shrink:0;

}

.service-info h3{

    font-size:13px;
    font-weight:700;

    color:#111827;

    margin-bottom:3px;

}

.service-info p{

    font-size:10px;

    color:#9ca3af;

    line-height:1.4;

    max-width:150px;

}

/* =========================
    RIGHT
========================== */

.active-right{

    display:flex;
    flex-direction:column;
    align-items:flex-end;

    gap:6px;

}

.status-badge{

    background:#fff8df;

    color:#d4a300;

    padding:7px 12px;

    border-radius:30px;

    font-size:10px;
    font-weight:700;

}

.active-right span{

    font-size:10px;

    color:#9ca3af;

    font-weight:500;

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:768px){

    .active-order-card{

        flex-direction:column;
        align-items:flex-start;

        gap:10px;

    }

    .active-right{

        align-items:flex-start;

    }

}

</style>