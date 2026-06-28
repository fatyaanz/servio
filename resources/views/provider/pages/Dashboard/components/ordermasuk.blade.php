<div class="order-section">

    <!-- HEADER -->

    <div class="section-header">

        <div class="section-title">

            <h2>
                Order masuk
            </h2>

            <span>
                {{ $pendingBookings->count() }}
            </span>

        </div>

        <a href="{{ route('provider.pesanan') }}">
            Lihat semua
        </a>

    </div>

    <!-- ORDER CARD LOOP -->
    @forelse($pendingBookings as $booking)
        <div class="order-card" style="margin-bottom: 16px;">

            <!-- TOP -->

            <div class="order-top">

                <div class="order-top-left">

                    <h4 style="color: #F08A28;">
                        #{{ $booking->formatted_id }}
                    </h4>

                    <p>
                        Waktu pengerjaan :
                        <span>
                            {{ substr($booking->booking_time, 0, 5) }} WIB
                        </span>
                    </p>

                </div>

                <div class="order-location" style="margin-right: 20px;">
                    📍 {{ Str::limit($booking->address, 60) }}
                </div>

            </div>

            <!-- MIDDLE -->

            <div class="order-middle">

                <!-- PROFILE -->

                <div class="customer-profile">

                    <img
                        src="{{ $booking->customer->profile_photo
                            ? asset('storage/' . $booking->customer->profile_photo)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($booking->customer->name)
                        }}"
                        class="customer-img"
                    >

                    <div>

                        <h3>
                            {{ $booking->customer->name }}
                        </h3>

                        <p>
                            {{ $booking->customer->phone ?? '-' }}
                        </p>

                        <span>
                            📍 {{ number_format($booking->customer->distanceTo(auth()->user()) ?? 0, 1) }} Km dari lokasi Anda
                        </span>

                    </div>

                </div>

                <!-- DETAIL -->

                <div class="order-detail">

                    <div class="detail-item">

                        <span>
                            Layanan
                        </span>

                        <p>
                            {{ $booking->subServices->first()?->providerService?->category?->name ?? 'Layanan' }}
                        </p>

                    </div>

                    <div class="detail-item">

                        <span>
                            Sub
                        </span>

                        <p>
                            @foreach($booking->subServices as $sub)
                                {{ $sub->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        </p>

                    </div>

                    <div class="detail-item">

                        <span>
                            Catatan
                        </span>

                        <p>
                            {{ $booking->notes ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- BOTTOM -->

            <div class="order-bottom" style="padding-right: 0;">

                <div class="response-time">

                    Masuk :
                    <span style="font-size: 13px; font-weight: 700; color: #6b7280;">
                        {{ $booking->created_at->diffForHumans() }}
                    </span>

                </div>

                <div class="order-buttons">

                    <form action="{{ route('provider.booking.reject', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="reject-btn">
                            Tolak
                        </button>
                    </form>

                    <form action="{{ route('provider.booking.accept', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="accept-btn">
                            Terima
                        </button>
                    </form>

                </div>

            </div>

        </div>
    @empty
        <div class="order-card" style="text-align: center; padding: 30px; color: #888;">
            Belum ada order masuk saat ini.
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
    ORDER SECTION
========================== */

.order-section{

    width:100%;

    background:rgba(255,255,255,0.72);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    border-radius:20px;

    padding:12px;

    border:1px solid rgba(255,255,255,0.35);

    box-shadow:
    0 8px 20px rgba(15,23,42,0.04);

}

/* =========================
    HEADER
========================== */

.section-header{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:10px;

    padding-right:95px;

}

.section-title{

    display:flex;
    align-items:center;
    gap:8px;

}

.section-title h2{

    font-size:14px;
    font-weight:700;

    color:#111827;

}

.section-title span{

    width:20px;
    height:20px;

    border-radius:50%;

    background:#ffedd5;

    color:#ff7a00;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:9px;
    font-weight:700;

}

.section-header a{

    text-decoration:none;

    color:#ff7a00;

    font-size:11px;
    font-weight:700;

}

/* =========================
    ORDER CARD
========================== */

.order-card{

    padding:12px;

    border-radius:16px;

    background:rgba(255,255,255,0.55);

    backdrop-filter:blur(14px);

    border:1px solid #eef2f7;

}

/* =========================
    TOP
========================== */

.order-top{

    display:flex;
    justify-content:space-between;
    align-items:flex-start;

    margin-bottom:10px;

}

.order-top-left{

    flex:1;

}

.order-top h4{

    font-size:12px;
    font-weight:700;

    color:#111827;

    margin-bottom:3px;

}

.order-top p{

    font-size:10px;

    color:#6b7280;

}

.order-location{

    width:210px;

    font-size:10px;

    color:#ef4444;

    font-weight:500;

    line-height:1.4;

    text-align:left;

    margin-right:80px;

}

/* =========================
    MIDDLE
========================== */

.order-middle{

    display:flex;
    gap:12px;

    margin-bottom:10px;

}

/* PROFILE */

.customer-profile{

    display:flex;
    align-items:center;

    gap:10px;

    min-width:180px;

}

.customer-img{

    width:42px;
    height:42px;

    border-radius:50%;

    object-fit:cover;

}

.customer-profile h3{

    font-size:13px;
    font-weight:700;

    color:#111827;

    margin-bottom:2px;

}
.order-bottom{
    padding-right:24px;
}

.customer-profile p{

    font-size:10px;

    color:#4b5563;

    margin-bottom:2px;

}

.customer-profile span{

    font-size:9px;

    color:#9ca3af;

}

/* DETAIL */

.order-detail{

    flex:1;

    border-left:1px solid #e5e7eb;

    padding-left:12px;

}

.detail-item{

    display:flex;

    gap:10px;

    margin-bottom:6px;

}

.detail-item span{

    width:70px;

    font-size:10px;

    color:#6b7280;

}

.detail-item p{

    font-size:10px;

    color:#374151;

    font-weight:500;

}

/* =========================
    BOTTOM
========================== */

.order-bottom{

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding-top:10px;

    border-top:1px solid #eef2f7;

    padding-right:80px;

}

.response-time{

    font-size:10px;

    color:#6b7280;

    font-weight:600;

}

.response-time span{

    color:#f59e0b;

    font-size:16px;
    font-weight:800;

    margin-left:4px;

}

/* BUTTON */

.order-buttons{

    display:flex;

    gap:8px;

}

.reject-btn{

    padding:7px 14px;

    border-radius:10px;

    border:1px solid #ff7a00;

    background:transparent;

    color:#ff7a00;

    font-size:10px;
    font-weight:700;

    cursor:pointer;

}

.accept-btn{

    padding:7px 14px;

    border:none;

    border-radius:10px;

    background:
    linear-gradient(
        135deg,
        #ffb066,
        #ff7a00
    );

    color:white;

    font-size:10px;
    font-weight:700;

    cursor:pointer;

}

/* =========================
    RESPONSIVE
========================== */

@media(max-width:768px){

    .section-header,
    .order-bottom{

        padding-right:0;

    }

    .order-location{

        margin-right:0;

        width:100%;

    }

    .order-top,
    .order-middle,
    .order-bottom{

        flex-direction:column;

    }

    .order-detail{

        border-left:none;

        padding-left:0;

    }

}

</style>