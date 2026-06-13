@php

$category =
    $booking->subServices
        ->first()
        ?->providerService
        ?->category;

@endphp

<div class="booking-info-card">

    <div class="card-header">

        <div class="header-icon">
            📋
        </div>

        <div>

            <h3>
                Informasi Booking
            </h3>

            <p>
                Detail pesanan layanan Anda
            </p>

        </div>

    </div>

    <div class="info-list">

        <div class="info-row">

            <span class="info-label">
                ID Order
            </span>

            <span class="info-value" style="color: #F08A28;">
                #{{ $booking->formatted_id }}
            </span>

        </div>

        <div class="info-row">

            <span class="info-label">
                Penyedia Layanan
            </span>

            <span class="info-value">
                {{ $booking->provider->name }}
            </span>

        </div>

        <div class="info-row">

            <span class="info-label">
                Layanan
            </span>

            <span class="info-value">
                {{ $category->name ?? '-' }}
            </span>

        </div>

        <div class="info-row">

            <span class="info-label">
                Sub Layanan
            </span>

            <span class="info-value">
                {{ $booking->subServices->pluck('name')->join(', ') }}
            </span>

        </div>

        <div class="info-row">

            <span class="info-label">
                Jadwal
            </span>

            <span class="info-value">
                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                    •
                    {{ substr($booking->booking_time,0,5) }}
            </span>

        </div>

        <div class="info-row">

            <span class="info-label">
                Alamat
            </span>

            <span class="info-value address">
                {{ $booking->address }}
            </span>

        </div>

        @if($booking->damage_description)
            <div class="info-row" style="flex-direction: column; align-items: flex-start; gap: 6px;">

                <span class="info-label">
                    Deskripsi Masalah
                </span>

                <span class="info-value" style="text-align: left; max-width: 100%; font-weight: 500; font-size: 14px; color: #4b5563; line-height: 1.6;">
                    {{ $booking->damage_description }}
                </span>

            </div>
        @endif

        @php
            $photos = [];
            if ($booking->damage_photo) {
                if (is_array($booking->damage_photo)) {
                    $photos = $booking->damage_photo;
                } else {
                    $decoded = json_decode($booking->damage_photo, true);
                    if (is_array($decoded)) {
                        $photos = $decoded;
                    } else {
                        $photos = [$booking->damage_photo];
                    }
                }
            }
        @endphp

        @if(count($photos) > 0)
            <div class="info-row" style="flex-direction: column; align-items: flex-start; gap: 8px;">

                <span class="info-label">
                    Foto Lampiran Kerusakan
                </span>

                <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 5px; width: 100%;">
                    @foreach($photos as $photo)
                        <div style="width: 100px; height: 100px; border-radius: 14px; overflow: hidden; border: 1px solid #ECECEC; box-shadow: 0 4px 10px rgba(0,0,0,0.03);">
                            <a href="{{ asset('storage/' . $photo) }}" target="_blank">
                                <img src="{{ asset('storage/' . $photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        @endif

    </div>

</div>

<style>

/* =========================
   CARD
========================= */

.booking-info-card{

    max-width:1200px;

    margin:20px auto;

    padding:25px;

    border-radius:28px;

    background:rgba(255,255,255,.92);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);
}

/* =========================
   HEADER
========================= */

.card-header{

    display:flex;
    align-items:center;

    gap:15px;

    margin-bottom:25px;
}

.header-icon{

    width:50px;
    height:50px;

    border-radius:14px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;

    background:#FFF6EE;

    color:#F08A28;
}

.card-header h3{

    margin:0;

    color:#222;

    font-size:22px;
    font-weight:800;
}

.card-header p{

    margin-top:4px;

    color:#888;

    font-size:13px;
}

/* =========================
   LIST
========================= */

.info-list{

    display:flex;

    flex-direction:column;

    gap:16px;
}

/* =========================
   ROW
========================= */

.info-row{

    display:flex;

    justify-content:space-between;

    align-items:flex-start;

    gap:25px;

    padding-bottom:16px;

    border-bottom:1px solid #F4F4F4;
}

.info-row:last-child{

    border-bottom:none;

    padding-bottom:0;
}

/* =========================
   LABEL
========================= */

.info-label{

    min-width:140px;

    color:#888;

    font-size:14px;

    font-weight:500;
}

/* =========================
   VALUE
========================= */

.info-value{

    color:#222;

    font-size:15px;

    font-weight:700;

    text-align:right;

    max-width:65%;
}

.address{

    line-height:1.7;
}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .booking-info-card{

        margin:15px;

        padding:20px;
    }

    .card-header{

        gap:12px;
    }

    .header-icon{

        width:42px;
        height:42px;

        font-size:18px;
    }

    .card-header h3{

        font-size:18px;
    }

    .info-row{

        flex-direction:column;

        gap:6px;
    }

    .info-label{

        min-width:auto;
    }

    .info-value{

        text-align:left;

        max-width:100%;
    }

}

</style>