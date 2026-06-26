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
                Detail Penyedia & Layanan
            </h3>

            <p>
                Informasi penyedia jasa dan layanan yang dipilih
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