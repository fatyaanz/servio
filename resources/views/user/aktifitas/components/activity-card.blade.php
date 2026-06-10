
@forelse($bookings as $booking)
@php

$category =
    $booking->subServices
        ->first()
        ?->providerService
        ?->category;

$totalMin =
    $booking->subServices->sum('price_min');

$totalMax =
    $booking->subServices->sum('price_max');

@endphp
<a
    href="{{ route('detail.aktifitas', $booking->id) }}"
    class="activity-card"
>

    <div class="status-badge
        {{ $booking->status }}
    ">
        {{ ucfirst(str_replace('_',' ',$booking->status)) }}
    </div>

    <div class="activity-content">

        <div class="activity-category-icon">

            @if($category && $category->icon)

                <img
                    src="{{ asset('storage/' . $category->icon) }}"
                    alt="{{ $category->name }}"
                    class="category-image"
                >

            @else

                🛠️

            @endif

        </div>

        <div class="activity-info">

            <div class="activity-main">

                <h3>
                    {{ $category->name ?? 'Layanan' }}
                </h3>

                <div class="activity-subservice-count">

                    {{ $booking->subServices->count() }}
                    Sub Layanan Dipilih

                </div>

                <div class="activity-subservices">

                    @foreach($booking->subServices->take(2) as $subService)

                        • {{ $subService->name }}<br>

                    @endforeach

                    @if($booking->subServices->count() > 2)

                        <span class="more-service">
                            +{{ $booking->subServices->count() - 2 }}
                            layanan lainnya
                        </span>

                    @endif

                </div>

                </div>

                    <div class="activity-side">

                        <div class="activity-date">

                            📅
                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                        </div>

                        <div class="activity-time">

                            🕒
                            {{ substr($booking->booking_time,0,5) }}

                        </div>

                        <div class="activity-price">

                            Rp{{ number_format($totalMin,0,',','.') }}
                            -
                            Rp{{ number_format($totalMax,0,',','.') }}

                        </div>

                    </div>

        </div>

        <div class="activity-arrow">
            →
        </div>

    </div>
</a>

@empty

<div class="activity-card empty-card">

    <div class="activity-info">

        <h3>
            Belum Ada Aktivitas
        </h3>

        <div class="activity-location">
            Booking pertama Anda akan muncul di sini.
        </div>

    </div>

</div>

@endforelse

<style>

/* =========================
   CARD
========================= */

.activity-card{

    max-width:1200px;

    margin:0 auto 20px;

    padding:22px;

    display:block;

    text-decoration:none;

    border-radius:24px;

    background:#FFFFFF;

    border:1px solid #F4E6D8;

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);

    transition:all .3s ease;
}

.activity-card:hover{

    transform:translateY(-4px);

    box-shadow:
        0 18px 35px rgba(0,0,0,.08);
}

/* =========================
   STATUS
========================= */

.status-badge{

    width:fit-content;

    display:flex;
    align-items:center;

    gap:8px;

    padding:8px 14px;

    border-radius:999px;

    margin-bottom:18px;

    font-size:12px;
    font-weight:700;
}

.status-dot{

    width:8px;
    height:8px;

    border-radius:50%;
}

.waiting{

    background:#FFF7E1;

    color:#D99200;
}

.waiting .status-dot{

    background:#D99200;
}

/* =========================
   CONTENT
========================= */

.activity-content{

    display:flex;

    align-items:center;

    gap:20px;
}

/* =========================
   CATEGORY ICON
========================= */

.activity-category-icon{

    width:95px;
    height:95px;

    flex-shrink:0;

    border-radius:22px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#FFF8F1;

    border:1px solid rgba(240,138,40,.12);

    overflow:hidden;
}

.category-image{

    width:65px;
    height:65px;

    object-fit:contain;
}

/* =========================
   INFO WRAPPER
========================= */

.activity-info{

    flex:1;

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:30px;
}

.activity-main{

    flex:1;

    min-width:0;
}

/* =========================
   TITLE
========================= */

.activity-info h3{

    margin:0;

    color:#222;

    font-size:26px;

    font-weight:800;

    line-height:1.3;
}

/* =========================
   SUB SERVICE
========================= */

.activity-subservice-count{

    margin-top:8px;

    color:#555;

    font-size:14px;

    font-weight:700;
}

.activity-subservices{

    margin-top:10px;

    color:#777;

    font-size:14px;

    line-height:1.8;
}

.more-service{

    color:#F08A28;

    font-weight:700;
}

/* =========================
   RIGHT SIDE
========================= */

.activity-side{

    width:240px;

    flex-shrink:0;

    display:flex;

    flex-direction:column;

    align-items:flex-end;

    gap:10px;
}

.activity-date{

    color:#666;

    font-size:14px;

    font-weight:600;
}

.activity-time{

    color:#666;

    font-size:14px;

    font-weight:600;
}

.activity-price{

    color:#F08A28;

    font-size:24px;

    font-weight:800;

    text-align:right;

    line-height:1.4;
}

/* =========================
   ARROW
========================= */

.activity-arrow{

    width:48px;
    height:48px;

    border-radius:50%;

    background:#FFF6EE;

    color:#F08A28;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;
    font-weight:700;

    flex-shrink:0;

    transition:.3s ease;
}

.activity-card:hover .activity-arrow{

    background:#F08A28;

    color:white;

    transform:translateX(5px);
}

/* =========================
   EMPTY STATE
========================= */

.empty-card{

    text-align:center;

    padding:40px;
}


.status-badge.pending{
    background:#FEF3C7;
    color:#D97706;
}

.status-badge.accepted{
    background:#DBEAFE;
    color:#2563EB;
}

.status-badge.on_the_way{
    background:#E0F2FE;
    color:#0284C7;
}

.status-badge.diagnosis{
    background:#F3E8FF;
    color:#9333EA;
}

.status-badge.waiting_approval{
    background:#FFF7ED;
    color:#EA580C;
}

.status-badge.approved{
    background:#DCFCE7;
    color:#16A34A;
}

.status-badge.working{
    background:#D1FAE5;
    color:#059669;
}

.status-badge.payment{
    background:#CFFAFE;
    color:#0891B2;
}

.status-badge.completed{
    background:#DCFCE7;
    color:#15803D;
}

.status-badge.cancelled{
    background:#FEE2E2;
    color:#DC2626;
}

.status-badge.rejected{
    background:#FFF7ED;
    color:#D97706;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .activity-card{

        margin:0 15px 15px;

        padding:16px;
    }

    .activity-content{

        align-items:flex-start;

        gap:14px;
    }

    .activity-category-icon{

        width:70px;
        height:70px;
    }

    .category-image{

        width:45px;
        height:45px;
    }

    .activity-info{

        flex-direction:column;

        align-items:flex-start;

        gap:14px;
    }

    .activity-side{

        width:100%;

        align-items:flex-start;

        gap:8px;
    }

    .activity-info h3{

        font-size:20px;
    }

    .activity-subservice-count{

        font-size:13px;
    }

    .activity-subservices{

        font-size:13px;
    }

    .activity-date{

        font-size:13px;
    }

    .activity-time{

        font-size:13px;
    }

    .activity-price{

        text-align:left;

        font-size:18px;
    }

    .activity-arrow{

        width:40px;
        height:40px;

        font-size:18px;
    }
}


</style>