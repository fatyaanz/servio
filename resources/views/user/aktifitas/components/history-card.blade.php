@forelse($bookings as $booking)

@php

$category =
    $booking->subServices
        ->first()
        ?->providerService
        ?->category;

@endphp

<a
    href="{{ route('detail.aktifitas', $booking->id) }}"
    class="history-card"
>

    <div class="history-status
        @if($booking->status == 'completed')
            completed
        @elseif($booking->status == 'cancelled')
            cancelled
        @elseif($booking->status == 'rejected')
            rejected
        @endif
    ">

        <span class="status-icon">

            @if($booking->status == 'completed')
                ✓
            @elseif($booking->status == 'cancelled')
                ✖
            @elseif($booking->status == 'rejected')
                ⚠️
            @endif

        </span>

        @if($booking->status == 'completed')

            Selesai

        @elseif($booking->status == 'cancelled')

            Dibatalkan

        @elseif($booking->status == 'rejected')

            Estimasi Ditolak

        @endif

    </div>

    <div class="history-content">

        <div class="history-image">

            @if($category && $category->icon)

                <img
                    src="{{ asset('storage/'.$category->icon) }}"
                    alt=""
                >

            @endif

        </div>

        <div class="history-info">

            <h3>

                {{ $category->name ?? 'Layanan' }}

            </h3>

            <div class="history-date">

                📅
                {{ \Carbon\Carbon::parse(
                    $booking->booking_date
                )->format('d M Y') }}

            </div>

            <div class="history-location">

                📍
                {{ $booking->address }}

            </div>

        </div>

        <div class="history-arrow">

            →

        </div>

    </div>

</a>

@empty

<div class="history-card">

    <div class="history-info">

        <h3>
            Belum Ada Riwayat
        </h3>

        <p>
            Pesanan yang selesai atau dibatalkan akan muncul di sini.
        </p>

    </div>

</div>

@endforelse

<style>

/* =========================
   CARD
========================= */

.history-card{

    max-width:1200px;

    margin:0 auto 20px;

    padding:20px;

    display:block;

    text-decoration:none;

    color:inherit;

    border-radius:24px;

    background:#FFFFFF;

    border:1px solid #F4E6D8;

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);

    transition:all .3s ease;
}

.history-card:hover{

    transform:translateY(-4px);

    box-shadow:
        0 18px 35px rgba(0,0,0,.08);
}

/* =========================
   STATUS
========================= */

.history-status{

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

.status-icon{

    font-size:11px;
}

.history-status.cancelled{

    background:#FDEAEA;

    color:#B42318;
}
.history-status.rejected{

    background:#FFF7E6;

    color:#D97706;

}

.history-status.completed{

    background:#EAF7EC;

    color:#28A745;
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
   IMAGE
========================= */

.history-image{

    width:90px;
    height:90px;

    border-radius:20px;

    overflow:hidden;

    background:#FAFAFA;

    border:1px solid #EEEEEE;

    flex-shrink:0;

    transition:.3s ease;
}

.history-image img{

    width:100%;
    height:100%;

    object-fit:cover;
}

.history-card:hover .history-image{

    transform:scale(1.03);
}

/* =========================
   INFO
========================= */

.history-info{

    flex:1;
}

.history-info h3{

    margin:0;

    color:#222;

    font-size:22px;
    font-weight:800;

    line-height:1.3;
}

.history-date{

    margin-top:10px;

    color:#666;

    font-size:14px;

    font-weight:500;
}

.history-location{

    margin-top:8px;

    color:#999;

    font-size:13px;

    line-height:1.6;
}

/* =========================
   ARROW
========================= */

.history-arrow{

    width:48px;
    height:48px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:50%;

    background:#FFF6EE;

    color:#F08A28;

    font-size:22px;
    font-weight:700;

    transition:.3s ease;
}

.history-card:hover .history-arrow{

    background:#F08A28;

    color:white;

    transform:translateX(5px);
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .history-card{

        margin:0 15px 15px;

        padding:16px;
    }

    .history-content{

        gap:12px;
    }

    .history-image{

        width:72px;
        height:72px;
    }

    .history-info h3{

        font-size:17px;
    }

    .history-date{

        font-size:12px;
    }

    .history-location{

        font-size:12px;
    }

    .history-arrow{

        width:40px;
        height:40px;

        font-size:18px;
    }

}

</style>