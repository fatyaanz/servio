<div class="provider-section">

    <div class="provider-grid">
        @forelse($providers as $providerService)

        @php
            $distance = Auth::check() ? Auth::user()->distanceTo($providerService->provider) : null;
            $avgRating = $providerService->provider->providerReviews->avg('rating') ?: 0;
            $minPrice = $providerService->subServices->min('price_min') ?: 0;
            $maxPrice = $providerService->subServices->max('price_max') ?: 0;
        @endphp

        <!-- CARD 1 -->
        <a
            href="{{ route(
                'provider.detail',
                $providerService->provider->id
            ) }}"
            class="provider-card"
        >

            @if($providerService->provider->experience)
                <div class="badge badge-purple" style="background:#7E57C2;">
                    ⭐ Pengalaman {{ $providerService->provider->experience }} Thn
                </div>
            @else
                <div class="badge badge-red">
                    Tepat Waktu
                </div>
            @endif

            <div class="provider-image">
                <img
                        id="previewPhoto"
                        src="{{ $providerService->provider->profile_photo
                            ? asset('storage/' . $providerService->provider->profile_photo)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($providerService->provider->name)
                        }}">
            </div>

            <div class="provider-content">

                <div class="provider-meta">
                    {{ $distance !== null ? number_format($distance, 1) . ' km' : '-' }} • {{ $distance !== null ? round(5 + ($distance * 3)) . ' min' : '-' }}
                </div>

                <h3>

                    {{ $providerService->provider->name }}

                </h3>

                <div class="provider-rating">
                    ⭐ {{ number_format($avgRating, 1) }}
                </div>

                <div class="provider-price">

                    <span class="price-label">
                        Estimasi
                    </span>

                    <span class="price-value">
                        💰 
                        @if($minPrice > 0 && $maxPrice > 0)
                            @if($minPrice == $maxPrice)
                                Rp{{ number_format($minPrice/1000, 0) }}k
                            @else
                                Rp{{ number_format($minPrice/1000, 0) }}k - Rp{{ number_format($maxPrice/1000, 0) }}k
                            @endif
                        @elseif($minPrice > 0)
                            Mulai Rp{{ number_format($minPrice/1000, 0) }}k
                        @else
                            Hubungi Jasa
                        @endif
                    </span>

                </div>

                <hr>

                <div class="provider-guarantee">
                    ✅ Garansi {{ $providerService->provider->warranty ?? 'Tidak ada' }}
                </div>

            </div>

        </a>

        @empty
        <p>
            Belum ada penyedia layanan untuk kategori ini.
        </p>
        @endforelse

</div>
<style>

.provider-section{
    max-width:1400px;
    margin:30px auto;
    padding:0 30px 120px;
}

.provider-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.provider-card{
    position:relative;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);

    border-radius:24px;

    overflow:hidden;

    box-shadow:
        0 10px 25px rgba(0,0,0,.06);

    transition:.3s ease;
    text-decoration:none !important;
    text-decoration:none;
}

.provider-card:hover{
    transform:translateY(-6px);

    box-shadow:
        0 15px 30px rgba(240,138,40,.15);
}

.provider-image{
    height:180px;
    overflow:hidden;
    background:#F9F9F9;
}

.provider-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

.provider-content{
    padding:16px;
}

.provider-meta{
    color:#A0A0A0;
    font-size:13px;
    margin-bottom:8px;
}

.provider-content h3{
    margin:0;

    font-size:16px;
    font-weight:700;

    color:#2F2534;

    line-height:1.4;
}

.provider-rating{
    margin-top:10px;

    text-align:right;

    font-size:14px;
    font-weight:700;
}

.provider-price{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-top:12px;
}

.price-label{
    color:#34736A;

    font-size:13px;
    font-weight:700;
}

.price-value{
    font-size:14px;
    font-weight:700;
}

.provider-content hr{
    margin:12px 0;

    border:none;
    border-top:1px solid #ECECEC;
}

.provider-guarantee{
    color:#92C44C;

    font-size:13px;
    font-weight:700;
}

.badge{
    position:absolute;

    top:12px;
    left:0;

    color:white;

    padding:8px 14px;

    font-size:11px;
    font-weight:700;

    border-radius:0 10px 10px 0;

    z-index:10;
}

.badge-red{
    background:#E53935;
}

.badge-purple{
    background:#7E57C2;
}

/* TABLET */

@media(max-width:1024px){

    .provider-grid{
        grid-template-columns:repeat(2,1fr);
    }

}

/* MOBILE */

@media(max-width:768px){

    .provider-section{
        padding:0 15px 100px;
    }

    .provider-grid{
        grid-template-columns:1fr;
    }

}

</style>