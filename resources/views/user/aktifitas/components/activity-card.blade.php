
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

    <div class="status-badge-new
        {{ $booking->status }}
    ">
        {{ ucfirst(str_replace('_',' ',$booking->status)) }}
    </div>

    <div class="activity-content">

        <div class="activity-category-icon">

            @if($booking->provider && $booking->provider->business_photo)
                <img
                    src="{{ asset('storage/' . $booking->provider->business_photo) }}"
                    alt="{{ $booking->provider->name }}"
                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 16px;"
                >
            @elseif($category && $category->icon)
                <img
                    src="{{ asset('storage/' . $category->icon) }}"
                    alt="{{ $category->name }}"
                    class="category-image"
                >
            @else
                <i class='bx bx-wrench' style="font-size:32px; color:var(--primary);"></i>
            @endif

        </div>

        <div class="activity-info">

            <div class="activity-main">

                <h3>
                    {{ $category->name ?? 'Layanan' }}
                    <span style="font-size: 12px; font-weight: 500; color: #9CA3AF; margin-left: 6px;">
                        #{{ $booking->formatted_id }}
                    </span>
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
                    <div class="activity-damage-photos" style="display: flex; gap: 8px; margin-top: 12px; flex-wrap: wrap;" onclick="event.preventDefault(); event.stopPropagation();">
                        @foreach($damagePhotos as $photo)
                            <div style="width: 44px; height: 44px; border-radius: 10px; overflow: hidden; border: 1px solid var(--border); box-shadow: var(--shadow-sm);">
                                <img src="{{ asset('storage/' . $photo) }}" style="width: 100%; height: 100%; object-fit: cover; cursor: pointer;" onclick="window.open('{{ asset('storage/' . $photo) }}', '_blank')">
                            </div>
                        @endforeach
                    </div>
                @endif

                </div>

                    <div class="activity-side">

                        <div class="activity-date">

                            <i class='bx bx-calendar' style="font-size:14px;"></i>
                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                        </div>

                        <div class="activity-time">

                            <i class='bx bx-time-five' style="font-size:14px;"></i>
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
            <i class='bx bx-right-arrow-alt'></i>
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

    margin:0 auto 16px;

    padding:20px;

    display:block;

    text-decoration:none;

    border-radius:16px;

    background:#FFFFFF;

    border:1px solid var(--border);

    box-shadow:var(--shadow-sm);

    transition:var(--transition);
}

.activity-card:hover{

    transform:translateY(-3px);

    box-shadow:var(--shadow-md);
}

/* =========================
   CONTENT
========================= */

.activity-content{

    display:flex;

    align-items:center;

    gap:16px;
}

/* =========================
   CATEGORY ICON
========================= */

.activity-category-icon{

    width:80px;
    height:80px;

    flex-shrink:0;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:var(--primary-light);

    border:1px solid rgba(226,135,67,.08);
}

.category-image{

    width:50px;
    height:50px;

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

    gap:24px;
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

    color:#000;

    font-size:18px;

    font-weight:700;

    line-height:1.3;
}

/* =========================
   SUB SERVICE
========================= */

.activity-subservice-count{

    margin-top:6px;

    color:#626B7A;

    font-size:13px;

    font-weight:600;
}

.activity-subservices{

    margin-top:8px;

    color:#9CA3AF;

    font-size:13px;

    line-height:1.8;
}

.more-service{

    color:var(--primary);

    font-weight:600;
}

/* =========================
   RIGHT SIDE
========================= */

.activity-side{

    width:200px;

    flex-shrink:0;

    display:flex;

    flex-direction:column;

    align-items:flex-end;

    gap:6px;
}

.activity-date,
.activity-time{

    color:#626B7A;

    font-size:13px;

    font-weight:500;

    display:flex;
    align-items:center;
    gap:4px;
}

.activity-price{

    color:var(--primary);

    font-size:18px;

    font-weight:700;

    text-align:right;

    line-height:1.4;

    margin-top:4px;
}

/* =========================
   ARROW
========================= */

.activity-arrow{

    width:40px;
    height:40px;

    border-radius:50%;

    background:var(--primary-light);

    color:var(--primary);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:20px;

    flex-shrink:0;

    transition:var(--transition);
}

.activity-card:hover .activity-arrow{

    background:var(--primary);

    color:white;

    transform:translateX(3px);
}

/* =========================
   EMPTY STATE
========================= */

.empty-card{

    text-align:center;

    padding:40px;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .activity-card{

        margin:0 12px 12px;

        padding:16px;
    }

    .activity-content{

        align-items:flex-start;

        gap:12px;
    }

    .activity-category-icon{

        width:60px;
        height:60px;
    }

    .category-image{

        width:38px;
        height:38px;
    }

    .activity-info{

        flex-direction:column;

        align-items:flex-start;

        gap:12px;
    }

    .activity-side{

        width:100%;

        align-items:flex-start;

        gap:6px;
    }

    .activity-info h3{

        font-size:16px;
    }

    .activity-price{

        text-align:left;

        font-size:16px;
    }

    .activity-arrow{

        width:36px;
        height:36px;

        font-size:18px;
    }
}


</style>