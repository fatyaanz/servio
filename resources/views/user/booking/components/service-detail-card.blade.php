@php

$category =
    $provider
    ->providerServices
    ->first()
    ?->category;

@endphp

<div class="booking-card">

    <div class="card-title">
        Detail Layanan
    </div>

    <div class="service-detail-wrapper">

        <div class="service-icon">

            <img
                src="{{ $category && $category->icon
                    ? asset('storage/' . $category->icon)
                    : asset('assets/images/provider-logo.png') }}"
                alt="Kategori"
            >

        </div>

        <div class="service-information">

            <div class="detail-row">

                <span class="detail-label">
                    Layanan
                </span>

                <span class="detail-value">
                    {{ $category->name }}
                </span>

            </div>

            <div class="detail-row">

                <span class="detail-label">
                    Sub Layanan
                </span>

                <span class="detail-value">

                    @foreach($subServices as $subService)

                        {{ $subService->name }}

                        @if(!$loop->last)
                            ,
                        @endif

                    @endforeach

                </span>

            </div>



        </div>

    </div>

    <hr class="detail-divider">

    <div class="price-section">

        <div class="price-title">

            💰 Estimasi Harga

        </div>

        @php

        $minPrice = $subServices->sum('price_min');

        $maxPrice = $subServices->sum('price_max');

        @endphp

        <div class="price-value">

            Rp{{ number_format($minPrice,0,',','.') }}
            -
            Rp{{ number_format($maxPrice,0,',','.') }}

        </div>

        <div class="price-note">

            *Harga final akan diinformasikan
            setelah pengecekan teknisi dilakukan

        </div>

    </div>

</div>

<style>

.booking-card{

    max-width:1000px;

    margin:0 auto 25px;

    padding:25px;

    background:white;

    border-radius:24px;

    box-shadow:
        0 8px 20px rgba(0,0,0,.05);
}

.card-title{

    font-size:22px;

    font-weight:700;

    margin-bottom:20px;
}

/* =====================
   WRAPPER
===================== */

.service-detail-wrapper{

    display:flex;

    gap:25px;

    align-items:flex-start;
}

/* =====================
   ICON
===================== */

.service-icon{

    width:110px;
    height:110px;

    border-radius:16px;

    overflow:hidden;

    border:1px solid #EEE;

    flex-shrink:0;
}

.service-icon img{

    width:100%;
    height:100%;

    object-fit:cover;
}

/* =====================
   INFO
===================== */

.service-information{

    flex:1;
}

.detail-row{

    display:flex;

    justify-content:space-between;

    padding:10px 0;

    border-bottom:1px solid #F1F1F1;
}

.detail-label{

    color:#666;

    font-weight:500;
}

.detail-value{

    color:#222;

    font-weight:600;

    text-align:right;
}

/* =====================
   PRICE
===================== */

.detail-divider{

    margin:25px 0;

    border:none;

    border-top:1px solid #EEE;
}

.price-title{

    color:#7BAE45;

    font-weight:700;

    margin-bottom:10px;
}

.price-value{

    font-size:28px;

    font-weight:800;

    color:#222;
}

.price-note{

    margin-top:10px;

    color:#888;

    font-size:13px;

    line-height:1.6;
}

/* =====================
   MOBILE
===================== */

@media(max-width:768px){

    .service-detail-wrapper{

        flex-direction:column;
    }

    .service-icon{

        width:90px;
        height:90px;
    }

    .detail-row{

        flex-direction:column;

        gap:5px;
    }

    .detail-value{

        text-align:left;
    }

    .price-value{

        font-size:22px;
    }

}

</style>