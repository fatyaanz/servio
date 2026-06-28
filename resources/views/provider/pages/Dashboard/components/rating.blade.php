<div class="rating-section">

    <!-- HEADER -->

    <div class="rating-header">

        <h2>
            Rating & Ulasan (24 Jam Terakhir)
        </h2>

        <a href="{{ route('provider.ulasan') }}">
            Lihat semua
        </a>

    </div>

    @forelse($reviews as $review)
        <!-- REVIEW CARD -->

        <div class="review-card">

            <!-- TOP -->

            <div class="review-top">

                <div class="review-user">

                    <img
                        src="{{ $review->customer->profile_photo
                            ? asset('storage/' . $review->customer->profile_photo)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($review->customer->name)
                        }}"
                        class="review-profile"
                    >

                    <div>

                        <h3>
                            {{ $review->customer->name }}
                        </h3>

                        <p>
                            ID Order :
                            #{{ $review->booking->id }}
                        </p>

                    </div>

                </div>

                <div class="review-rating">
                    <i class='bx bxs-star' style="color:#ff7a00;"></i> {{ number_format($review->rating, 1) }}
                </div>

            </div>

            <!-- LAYANAN -->

            <div class="review-service">

                <span>
                    Layanan Dipilih
                </span>

                <p>
                    @foreach($review->booking->subServices as $subService)
                        {{ $subService->name }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </p>

            </div>

            <!-- ULASAN -->

            <div class="review-comment">

                “{{ $review->comment }}”

            </div>

        </div>
    @empty
        <div class="review-card" style="text-align: center; color: #888; padding: 30px;">
            Belum ada rating dan ulasan dari pelanggan.
        </div>
    @endforelse

</div>

<style>

/* =========================
    RATING SECTION
========================== */

.rating-section{

    margin-top:24px;

    background:white;

    border-radius:28px;

    padding:24px;

    border:1px solid #eef0f4;

    box-shadow:
    0 6px 18px rgba(15,23,42,0.04);

}

/* =========================
    HEADER
========================== */

.rating-header{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:24px;

}

.rating-header h2{

    font-size:22px;
    color:#111827;

}

.rating-header a{

    text-decoration:none;

    color:#ff7a00;

    font-size:13px;
    font-weight:600;

}

/* =========================
    REVIEW CARD
========================== */

.review-card{

    padding:22px;

    border:1px solid #eef0f4;

    border-radius:22px;

    margin-bottom:18px;

    transition:0.3s ease;

}

.review-card:hover{

    transform:translateY(-3px);

    box-shadow:
    0 10px 20px rgba(15,23,42,0.06);

}

/* =========================
    TOP
========================== */

.review-top{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:18px;

}

.review-user{

    display:flex;
    align-items:center;
    gap:14px;

}

.review-profile{

    width:56px;
    height:56px;

    border-radius:18px;

    object-fit:cover;

}

.review-user h3{

    font-size:16px;
    color:#111827;

    margin-bottom:4px;

}

.review-user p{

    font-size:12px;
    color:#9ca3af;

}

.review-rating{

    background:#fff7ed;

    color:#ff7a00;

    padding:10px 16px;

    border-radius:14px;

    font-size:14px;
    font-weight:700;

}

/* =========================
    SERVICE
========================== */

.review-service{

    margin-bottom:18px;

}

.review-service span{

    font-size:12px;
    color:#9ca3af;

}

.review-service p{

    margin-top:4px;

    font-size:14px;
    font-weight:600;

    color:#111827;

}

/* =========================
    IMAGES
========================== */

.review-images{

    display:flex;
    gap:12px;

    margin-bottom:18px;

}

.review-images img{

    width:110px;
    height:80px;

    object-fit:cover;

    border-radius:16px;

}

/* =========================
    COMMENT
========================== */

.review-comment{

    font-size:14px;
    line-height:1.7;

    color:#4b5563;

    background:#f9fafb;

    padding:16px;

    border-radius:16px;

}

</style>