<div class="provider-info">

    <div class="provider-top">

        <div class="provider-logo">

            <img
                        id="previewPhoto"
                        src="{{ $provider->profile_photo
                            ? asset('storage/' . $provider->profile_photo)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($provider->name)
                        }}">

        </div>

        <div class="provider-detail">

            <span class="provider-badge">
                Tepat Waktu
            </span>

                <h2>

                    {{ $provider->name }}

                </h2>

            @php
                $avgRating = $provider->providerReviews()->avg('rating') ?: 0;
                $reviewCount = $provider->providerReviews()->count();
                $satisfiedCount = $provider->providerReviews()->where('rating', '>=', 4)->count();
                $satisfactionRate = $reviewCount > 0 ? round(($satisfiedCount / $reviewCount) * 100) : 100;
                $distance = Auth::check() ? Auth::user()->distanceTo($provider) : null;
            @endphp

            <div class="provider-rating">

                <span class="rating-score">
                    ⭐ {{ number_format($avgRating, 1) }}
                </span>

                <span class="review-count">
                    {{ $reviewCount }} Ulasan
                </span>

            </div>

            <div class="provider-satisfaction">
                👍 {{ $satisfactionRate }}% Pelanggan puas
            </div>

        </div>

    </div>

    <div class="provider-features">

        <div class="feature-card">

            <div class="feature-icon">
                📍
            </div>

            <div>
                <h4>{{ $distance !== null ? number_format($distance, 1) . ' km' : '-' }}</h4>
                <span>Dari lokasi Anda</span>
            </div>

        </div>

        <div class="feature-card">

            <div class="feature-icon">
                🛡️
            </div>

            <div>
                <h4>{{ $provider->warranty ?? 'Tidak ada' }}</h4>
                <span>Garansi</span>
            </div>

        </div>

        <div class="feature-card">

            <div class="feature-icon">
                ⏰
            </div>

            <div>
                <h4>{{ $distance !== null ? round(5 + ($distance * 3)) . ' Menit' : '-' }}</h4>
                <span>Estimasi Datang</span>
            </div>

        </div>

    </div>

</div>

<style>

/* =========================
   PROVIDER INFO
========================= */

.provider-info{
    max-width:1400px;

    margin:0 auto;

    padding:0 30px;
}

/* =========================
   TOP SECTION
========================= */

.provider-top{
    display:flex;
    align-items:center;

    gap:24px;
}

/* =========================
   LOGO
========================= */

.provider-logo{
    width:170px;
    height:170px;

    flex-shrink:0;

    display:flex;
    justify-content:center;
    align-items:center;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);

    border-radius:24px;

    box-shadow:
        0 10px 25px rgba(0,0,0,.05);
}

.provider-logo img{
    width:100px;
    height:100px;

    object-fit:contain;
}

/* =========================
   DETAIL
========================= */

.provider-detail{
    flex:1;
}

.provider-badge{
    display:inline-flex;
    align-items:center;

    padding:8px 14px;

    border-radius:999px;

    background:#E53935;

    color:white;

    font-size:12px;
    font-weight:700;
}

.provider-detail h2{
    margin:12px 0 10px;

    font-size:32px;
    font-weight:800;

    color:#222;

    line-height:1.3;
}

.provider-rating{
    display:flex;
    align-items:center;
    gap:10px;

    flex-wrap:wrap;
}

.rating-score{
    font-size:18px;
    font-weight:700;
}

.review-count{
    color:#888;

    font-size:14px;
    font-weight:500;
}

.provider-satisfaction{
    margin-top:10px;

    color:#4CAF50;

    font-size:16px;
    font-weight:700;
}

/* =========================
   FEATURES
========================= */

.provider-features{
    margin-top:28px;

    display:grid;
    grid-template-columns:repeat(3,1fr);

    gap:18px;
}

.feature-card{
    display:flex;
    align-items:center;

    gap:14px;

    padding:18px;

    border-radius:20px;

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);

    border:1px solid rgba(240,138,40,.10);

    box-shadow:
        0 8px 20px rgba(0,0,0,.04);

    transition:.3s ease;
}

.feature-card:hover{
    transform:translateY(-3px);

    box-shadow:
        0 12px 25px rgba(240,138,40,.08);
}

.feature-icon{
    font-size:26px;
}

.feature-card h4{
    margin:0;

    font-size:18px;
    font-weight:800;

    color:#222;
}

.feature-card span{
    color:#777;

    font-size:13px;
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .provider-info{
        padding:0 20px;
    }

    .provider-detail h2{
        font-size:28px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .provider-info{
        padding:0 15px;
    }

    .provider-top{
        flex-direction:column;

        text-align:center;
    }

    .provider-logo{
        width:150px;
        height:150px;
    }

    .provider-logo img{
        width:90px;
        height:90px;
    }

    .provider-detail h2{
        font-size:24px;
    }

    .provider-rating{
        justify-content:center;
    }

    .provider-features{
        grid-template-columns:1fr;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .provider-detail h2{
        font-size:22px;
    }

    .provider-satisfaction{
        font-size:14px;
    }

}

</style>