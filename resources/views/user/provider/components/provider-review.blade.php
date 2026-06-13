<div class="provider-review">

    @php
        $avgRating = $provider->providerReviews()->avg('rating') ?: 0;
        $reviewCount = $provider->providerReviews()->count();
    @endphp

    <div class="review-header">

        <div>
            <h3>Ulasan Pelanggan</h3>

            <span class="review-total">
                {{ $reviewCount }} Ulasan Terverifikasi
            </span>
        </div>

        <div class="review-score">
            ⭐ {{ number_format($avgRating, 1) }}/5
        </div>

    </div>

    @forelse($provider->providerReviews()->with('customer')->latest()->get() as $review)
        <div class="review-card">

            <div class="review-top">

                <div class="review-avatar" style="overflow: hidden; display: flex; align-items: center; justify-content: center; width: 52px; height: 52px; border-radius: 50%;">
                    @if($review->customer->profile_photo)
                        <img src="{{ asset('storage/' . $review->customer->profile_photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        {{ strtoupper(substr($review->customer->name, 0, 1)) }}
                    @endif
                </div>

                <div class="review-user">

                    <h4>{{ $review->customer->name }}</h4>

                    <span>{{ $review->created_at->diffForHumans() }}</span>

                </div>

                <div class="review-rating">
                    {{ str_repeat('⭐', $review->rating) }}
                </div>

            </div>

            <p class="review-text">
                {{ $review->comment }}
            </p>

        </div>
    @empty
        <div class="review-card" style="text-align: center; color: #888; padding: 40px 20px;">
            Belum ada ulasan untuk penyedia layanan ini.
        </div>
    @endforelse

</div>

<style>

/* =========================
   REVIEW SECTION
========================= */

.provider-review{
    max-width:1400px;

    margin:35px auto 120px;

    padding:0 30px;
}

/* =========================
   HEADER
========================= */

.review-header{
    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:20px;
}

.review-header h3{
    margin:0;

    font-size:24px;
    font-weight:800;

    color:#222;
}

.review-total{
    display:block;

    margin-top:6px;

    font-size:13px;

    color:#888;
}

.review-score{

    padding:10px 16px;

    border-radius:999px;

    background:rgba(240,138,40,.10);

    color:#F08A28;

    font-size:14px;
    font-weight:700;

    border:1px solid rgba(240,138,40,.15);
}

/* =========================
   REVIEW CARD
========================= */

.review-card{

    background:rgba(255,255,255,.85);

    backdrop-filter:blur(15px);
    -webkit-backdrop-filter:blur(15px);

    border-radius:24px;

    padding:22px;

    margin-bottom:18px;

    border:1px solid rgba(240,138,40,.08);

    box-shadow:
        0 10px 25px rgba(0,0,0,.04);

    transition:.3s ease;
}

.review-card:hover{

    transform:translateY(-3px);

    box-shadow:
        0 15px 30px rgba(240,138,40,.08);
}

/* =========================
   TOP
========================= */

.review-top{

    display:flex;
    align-items:center;

    gap:14px;
}

.review-avatar{

    width:52px;
    height:52px;

    flex-shrink:0;

    border-radius:50%;

    background:linear-gradient(
        135deg,
        #F08A28,
        #FFB04D
    );

    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:18px;
    font-weight:800;
}

.review-user{

    flex:1;
}

.review-user h4{
    margin:0;

    font-size:16px;
    font-weight:700;

    color:#222;
}

.review-user span{

    font-size:13px;

    color:#888;
}

.review-rating{

    padding:6px 12px;

    border-radius:999px;

    background:#FFF6EE;

    font-size:13px;
}

/* =========================
   TEXT
========================= */

.review-text{

    margin-top:15px;

    color:#555;

    font-size:14px;

    line-height:1.8;
}

/* =========================
   IMAGES
========================= */

.review-images{

    margin-top:18px;

    display:flex;
    gap:12px;
}

.review-image{

    width:90px;
    height:90px;

    border-radius:16px;

    background:#F2F2F2;

    transition:.3s ease;
}

.review-image:hover{

    transform:scale(1.05);
}

/* =========================
   TABLET
========================= */

@media(max-width:1024px){

    .provider-review{
        padding:0 20px;
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .provider-review{
        padding:0 15px;
    }

    .review-header{
        flex-direction:column;
        align-items:flex-start;

        gap:12px;
    }

    .review-top{
        flex-wrap:wrap;
    }

    .review-rating{
        margin-left:66px;
    }

    .review-images{
        flex-wrap:wrap;
    }

    .review-image{
        width:75px;
        height:75px;
    }

}

/* =========================
   MOBILE KECIL
========================= */

@media(max-width:480px){

    .review-card{
        padding:18px;
    }

    .review-header h3{
        font-size:20px;
    }

    .review-text{
        font-size:13px;
    }

    .review-avatar{
        width:45px;
        height:45px;
    }

}

</style>